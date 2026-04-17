<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Widgets\UsersOverview;
use App\Models\Payment;
use Filament\Forms\Components\Repeater;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_admin')
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),

                Section::make('Bank Account')
                    ->relationship('bank')
                    ->schema([
                        Forms\Components\Select::make('bank_type')
                            ->label('Bank Name')
                            ->reactive()
                            ->required()
                            ->options([
                                'bank' => 'Bank',
                                'wallet' => 'E-Wallet',
                            ]),
                        Forms\Components\Select::make('bank_name')
                            ->label('Bank Name')
                            ->required()
                            ->reactive()
                            ->options(fn(callable $get) => !$get('bank_type') ? [] : Payment::where('bank_type', $get('bank_type'))->pluck('bank_name', 'bank_name')->toArray()),
                        Forms\Components\TextInput::make('account_name')
                            ->label('Account Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('account_number')
                            ->label('Account Number')
                            ->required()
                            ->alphaNum()
                            ->maxLength(255),
                    ]),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->nullable()
                    ->revealable()
                    ->columnSpanFull()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('#')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('username')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bank.bank_name')
                    ->label('Bank Account')
                    ->copyable()
                    ->description(fn(User $record): HtmlString => new HtmlString($record->bank->account_name . '<br>' . $record->bank->account_number))
                    ->alignCenter()
                    ->searchable(query: fn($query, string $search) => $query->whereHas('bank', fn($q) => $q->where('account_name', 'like', "%{$search}%")->orWhere('account_number', 'like', "%{$search}%"))),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('phone')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('referral')
                    ->label('Upline')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('balance')
                    ->numeric()
                    ->copyable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_downline')
                    ->label('Downline')
                    ->numeric()
                    ->copyable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
