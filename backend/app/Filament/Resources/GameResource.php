<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Game;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GameResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Provider;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationGroup = 'API';
    protected static ?string $navigationIcon = 'phosphor-game-controller-light';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('provider_id')
                    ->relationship('provider', 'name')
                    ->required(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('banner')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('category')
                    ->options([
                        'new' => 'New Game',
                        'hot' => 'Popular Game',
                        'idn' => 'IDN Game',
                        'lvup' => 'Level Up Game',
                        'basic' => 'Basic',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('is_maintenance')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('#')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('provider.name')
                    ->numeric()
                    ->copyable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new' => 'gray',
                        'hot' => 'warning',
                        'idn' => 'success',
                        'lvup' => 'danger',
                        'basic' => 'primary',
                    }),
                Tables\Columns\ImageColumn::make('banner')
                    ->defaultImageUrl(fn(Game $record) => Str::isUrl($record->banner) ? $record->banner : 'https://classbet97x.space/nexus/images/games/' . $record->banner)
                    ->size(100)
                    ->square(),
                Tables\Columns\IconColumn::make('is_maintenance')
                    ->alignCenter()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('provider_id')
                    ->label('Providers')
                    ->options(Provider::query()->pluck('name', 'id')->toArray())
                    ->searchable()
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
