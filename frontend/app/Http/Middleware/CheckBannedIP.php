<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CheckBannedIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checkDbCache = DB::table('cache')->where('key', '=', 'indoplay96_cache_website')->exists();
        if (!$checkDbCache) {
            Cache::flush();
            $dbTableSeos = DB::table('seos')->first();
            if ($dbTableSeos) {
                $website = Cache::rememberForever('website', fn() => $dbTableSeos);
            }
        } else {
            $website = Cache::get('website');
        }

        if (env('APP_NAME') != $website->web_name) {
            $configs = [
                'app.name' => $website->web_name,
                'app.url' => $website->main_url,
                'app.cdn' => $website->cdn_url,
                'app.favicon' => $website->favicon,
                'app.desktop_logo' => $website->desktop_logo,
                'app.mobile_logo' => $website->mobile_logo,
                'app.card_image' => $website->card_image,
                'app.title' => $website->title,
                'app.keyword' => $website->keyword,
                'app.description' => $website->description
            ];

            foreach ($configs as $key => $config) {
                config([$key => $config]);
            }
        }

        $ipAddress = $request->ip();
        $bannedIps = Cache::rememberForever('banned_ips', fn() => DB::table('banneds')->pluck('ip_address')->toArray());

        if (in_array($ipAddress, $bannedIps)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
