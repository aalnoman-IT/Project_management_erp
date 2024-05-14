<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\Role;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Toggle;

use Filament\Forms\Components\Select;

use Filament\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

use Filament\Tables\Columns\SelectColumn;


use Filament\Tables\Columns\BooleanColumn;

use Filament\Tables\Actions\Action;

use Filament\Tables\Actions\BulkActionGroup;

use Filament\Tables\Actions\EditAction;

use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')

                    ->required(),


                TextInput::make('email')

                    ->required()
                    ->email(),
    

                TextInput::make('password')

                    ->password()
                    ->minLength(8)
                    ->required(),


                // ToggleColumn::make('is_active')
                //     ->required(),

                Select::make('role_id')

                ->label('Role')

                ->options(Role::all()->pluck('name', 'id'))

                ->required(),
        ]);

      
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')

                ->sortable(),


            TextColumn::make('email')

                ->sortable()

                ->searchable(),


            // IconColumn::make('is_active')

            //     ->boolean()
            //     ->sortable(),


           TextColumn::make('role.name')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
