<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\CoinOverview;
use App\Models\Contact;
use App\Models\Seo;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class Settings extends Page
{
    protected static ?string $navigationLabel = 'Website';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-s-globe-asia-australia';
    protected static string $view = 'filament.pages.settings';
    protected static ?int $navigationSort = 5;

    protected function getHeaderWidgets(): array
    {
        return [
            CoinOverview::class
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('website')
                ->icon('heroicon-m-pencil-square')
                ->color('gray')
                ->form([
                    TextInput::make('web_name')
                        ->required(),
                    Section::make('URL')
                        ->schema([
                            TextInput::make('main_url')
                                ->required()
                                ->columnSpan(1),
                            TextInput::make('cdn_url')
                                ->required()
                                ->columnSpan(1),
                        ])
                        ->columns(2),
                    Section::make('File Upload')
                        ->schema([
                            FileUpload::make('desktop_logo')
                                ->required()
                                ->image()
                                ->directory('website'),
                            FileUpload::make('mobile_logo')
                                ->required()
                                ->image()
                                ->directory('website'),
                            FileUpload::make('favicon')
                                ->required()
                                ->image()
                                ->directory('website'),
                            FileUpload::make('card_image')
                                ->required()
                                ->image()
                                ->columnSpanFull()
                                ->directory('website'),
                        ])
                        ->columns(3),
                ])
                ->fillForm(function (): array {
                    $record = Seo::first();
                    return [
                        'web_name' => $record?->web_name,
                        'main_url' => $record?->main_url,
                        'cdn_url' => $record?->cdn_url,
                        'desktop_logo' => $record?->desktop_logo,
                        'mobile_logo' => $record?->mobile_logo,
                        'favicon' => $record?->favicon,
                        'card_image' => $record?->card_image,
                    ];
                })
                ->action(function (array $data): void {
                    DB::table('cache')->truncate();
                    Cache::flush();
                    $record = Seo::firstOrFail();
                    $data['title'] = $record->title;
                    $data['keyword'] = $record->keyword;
                    $data['description'] = $record->description;
                    $record->update($data);

                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                }),
            Action::make('seo')
                ->icon('heroicon-m-pencil-square')
                ->color('gray')
                ->form([
                    Section::make('Meta Tag Manager')
                        ->schema([
                            TextInput::make('title')
                                ->required(),
                            Textarea::make('keyword')
                                ->required(),
                            Textarea::make('description')
                                ->required(),
                        ]),
                    Section::make('Google Tag Manager')
                        ->schema([
                            TextInput::make('g_tag')
                                ->label('Google Tags ID'),
                            TextInput::make('g_analytic')
                                ->label('Google Analytics ID'),
                        ])
                        ->columns(2)
                ])
                ->fillForm(function (): array {
                    $record = Seo::first();
                    return [
                        'title' => $record?->title,
                        'keyword' => $record?->keyword,
                        'description' => $record?->description,
                        'g_tag' => $record?->g_tag,
                        'g_analytic' => $record?->g_analytic,
                    ];
                })
                ->action(function (array $data): void {
                    DB::table('cache')->truncate();
                    Cache::flush();
                    $record = Seo::firstOrFail();
                    $data['web_name'] = $record->web_name;
                    $data['main_url'] = $record->main_url;
                    $data['cdn_url'] = $record->cdn_url;
                    $data['desktop_logo'] = $record->desktop_logo;
                    $data['mobile_logo'] = $record->mobile_logo;
                    $data['favicon'] = $record->favicon;
                    $data['card_image'] = $record->card_image;
                    $record->update($data);
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                }),
            Action::make('contact')
                ->icon('heroicon-m-pencil-square')
                ->color('gray')
                ->form([
                    TextInput::make('email'),
                    TextInput::make('whatsapp')
                        ->prefix('+62'),
                    TextInput::make('telegram')
                        ->prefix('https://t.me/'),
                    TextInput::make('facebook')
                        ->prefix('https://www.facebook.com/groups/'),
                    TextInput::make('livechat')
                        ->prefix('https://tawk.to/chat/'),
                ])
                ->fillForm(function (): array {
                    $record = Contact::first();
                    return [
                        'email' => $record->email ?? null,
                        'whatsapp' => $record->whatsapp ?? null,
                        'telegram' => $record->telegram ?? null,
                        'facebook' => $record->facebook ?? null,
                        'livechat' => $record->livechat ?? null,
                    ];
                })
                ->action(function (array $data): void {
                    DB::table('cache')->truncate();
                    Cache::flush();
                    $record = Contact::firstOrFail();
                    $record->update($data);
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                }),
            Action::make('backup')
                ->icon('heroicon-c-command-line')
                ->color('primary')
                ->action(fn() => Storage::download('backup/backup.sql')),
        ];
    }
}
