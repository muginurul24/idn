<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Justqiu
{
    private string $endpoint;

    private string $agent;

    private string $token;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->endpoint = rtrim((string) config('justqiu.endpoint'), '/');
        $this->agent = (string) config('justqiu.agent');
        $this->token = (string) config('justqiu.token');
    }

    public function register(string $username): array
    {
        return $this->sendRequest('user/create', 'POST', [
            'username' => Str::lower($username),
        ]);
    }

    public function transaction(string $type, string $username, int $amount, bool $retryIfMissing = false): array
    {
        $type = match ($type) {
            'withdrawal' => 'withdraw',
            default => $type,
        };

        $perform = fn(): array => $this->sendRequest(
            $type === 'deposit' ? 'user/deposit' : 'user/withdraw',
            'POST',
            [
                'username' => Str::lower($username),
                'amount' => $amount,
            ],
        );

        $response = $perform();

        return $retryIfMissing
            ? $this->retryIfPlayerMissing($response, $username, $perform)
            : $response;
    }

    public function balance(?string $username = null, bool $retryIfMissing = false): array
    {
        $perform = fn(): array => $this->sendRequest('money/info', 'POST', array_filter([
            'username' => filled($username) ? Str::lower($username) : null,
        ]));

        $response = $perform();

        if (! $retryIfMissing || ! filled($username)) {
            return $response;
        }

        return $this->retryIfPlayerMissing($response, $username, $perform);
    }

    public function providers(): array
    {
        return $this->sendRequest('providers', 'GET');
    }

    public function games(string $provider): array
    {
        return $this->sendRequest('games', 'POST', [
            'provider_code' => $provider,
        ]);
    }

    public function launch(string $username, string $provider, string $game, string $language = 'en', bool $retryIfMissing = false): array
    {
        $perform = fn(): array => $this->sendRequest('game/launch', 'POST', array_filter([
            'username' => Str::lower($username),
            'provider_code' => $provider,
            'game_code' => $game,
            'lang' => $language,
        ], fn(mixed $value): bool => $value !== null && $value !== ''));

        $response = $perform();

        return $retryIfMissing
            ? $this->retryIfPlayerMissing($response, $username, $perform)
            : $response;
    }

    public function merchantInfo(): array
    {
        return $this->sendRequest('merchant-active', 'POST', [
            'label' => $this->agent,
        ]);
    }

    public function generate(string $username, int $amount, ?int $expire = null, ?string $customRef = null): array
    {
        return $this->sendRequest('generate', 'POST', array_filter([
            'username' => Str::lower($username),
            'amount' => $amount,
            'expire' => $expire,
            'custom_ref' => $customRef,
        ], fn(mixed $value): bool => $value !== null && $value !== ''));
    }

    public function checkStatus(string $transactionId): array
    {
        return $this->sendRequest('check-status', 'POST', [
            'trx_id' => $transactionId,
        ]);
    }

    public function balanceQr(): array
    {
        return $this->sendRequest('balance', 'GET');
    }

    public function isSuccessful(array $response): bool
    {
        return ($response['success'] ?? false) === true;
    }

    public function isPlayerNotFound(array $response): bool
    {
        return ! $this->isSuccessful($response)
            && strcasecmp((string) ($response['message'] ?? ''), 'Player not found') === 0;
    }

    public function message(array $response, string $fallback = 'Request failed'): string
    {
        $message = $response['message'] ?? null;
        if (is_string($message) && $message !== '') {
            return $message;
        }

        $errors = $response['errors'] ?? null;
        if (is_array($errors)) {
            foreach ($errors as $errorBag) {
                if (! is_array($errorBag)) {
                    continue;
                }

                foreach ($errorBag as $error) {
                    if (is_string($error) && $error !== '') {
                        return $error;
                    }
                }
            }
        }

        return $fallback;
    }

    public function sendRequest(string $endpoint, string $method, array $data = []): array
    {
        $request = Http::withToken($this->token)
            ->acceptJson()
            ->asJson()
            ->timeout(30)
            ->connectTimeout(10)
            ->retry(2, 150, throw: false);

        $response = match (strtoupper($method)) {
            'GET' => $request->get($this->endpoint.'/'.$endpoint, $data),
            default => $request->post($this->endpoint.'/'.$endpoint, $data),
        };

        $payload = $response->json();

        if (is_array($payload)) {
            return $payload;
        }

        return [
            'success' => false,
            'message' => 'Invalid response from JustQiu service',
            'status_code' => $response->status(),
        ];
    }

    private function retryIfPlayerMissing(array $response, string $username, callable $perform): array
    {
        if (! $this->isPlayerNotFound($response)) {
            return $response;
        }

        $register = $this->register($username);
        if (! $this->isSuccessful($register) && ! $this->hasUsernameValidationError($register)) {
            return $response;
        }

        return $perform();
    }

    private function hasUsernameValidationError(array $response): bool
    {
        return isset($response['errors']['username']);
    }
}
