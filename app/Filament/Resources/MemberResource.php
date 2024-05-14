<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

use Filament\Tables\Filters\MultiSelectFilter;

use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Select;

use Filament\Forms\Components\DateTimePicker;

use Filament\Tables\Columns\TextColumn;

use Filament\Tables\Columns\SelectColumn;

use Filament\Tables\Actions\Action;

use Filament\Tables\Actions\BulkAction;

use Filament\Tables\Actions\DeleteAction;

use Filament\Tables\Actions\EditAction;

use Filament\Tables\Actions\ForceDeleteAction;

use Filament\Tables\Actions\RestoreAction;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Members';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')

            ->required(),

             

            Select::make('role_id')

            ->label('Role')

            ->options(Role::all()->pluck('name', 'id'))

            ->required(),


            TextInput::make('email')

                ->required()

                ->email(),



            TextInput::make('phone')

                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('name'),

            TextColumn::make('role.name'),

            TextColumn::make('email'),

            TextColumn::make('phone')

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
