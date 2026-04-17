<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Payment;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PaymentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaymentResource\RelationManagers;
use Filament\Forms\Get;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bank_type')
                    ->options([
                        'bank' => 'Bank',
                        'wallet' => 'E-Wallet',
                        'pulsa' => 'Pulsa',
                        'qris' => 'QRIS Payment'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('bank_name')
                    ->required()
                    ->readOnly(fn(Get $get): bool => $get('bank_type') === 'qris')
                    ->maxLength(255),
                Forms\Components\TextInput::make('account_bank_name')
                    ->label('Account name')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn(Get $get): bool => $get('bank_type') !== 'qris')
                    ->formatStateUsing(fn(Payment $record) => $record->account_name),
                Forms\Components\TextInput::make('account_number')
                    ->required()
                    ->maxLength(255)
                    ->visible(fn(Get $get): bool => $get('bank_type') !== 'qris'),
                Forms\Components\FileUpload::make('account_name')
                    ->label('QRIS Image')
                    ->columnSpanFull()
                    ->visible(fn(Get $get): bool => $get('bank_type') === 'qris')
                    ->required()
                    ->image()
                    ->directory('qr'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('bank_type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'bank' => 'success',
                        'wallet' => 'primary',
                        'pulsa' => 'danger',
                        'qris' => 'info',
                    })
                    ->formatStateUsing(fn(string $state): string => Str::upper($state))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bank_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_name')
                    ->copyable()
                    ->state(fn(Payment $record) => $record->bank_type == 'qris' ? 'QRIS Payment' : $record->account_name)
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_number')
                    ->copyable()
                    ->state(fn(Payment $record) => $record->bank_type == 'qris' ? 'QRIS Payment' : $record->account_number)
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
