<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectMemberResource\Pages;
use App\Filament\Resources\ProjectMemberResource\RelationManagers;
use App\Models\ProjectMember;
use Filament\Forms;
use App\Models\Member;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectMemberResource extends Resource
{
    protected static ?string $model = ProjectMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = 'Members';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('project_id')

            ->label('Project')

            ->options(Project::all()->pluck('name', 'id'))

            ->required(),
            Select::make('member_id')

            ->label('Member')

            ->options(Member::query()->where('role_id', 4)->pluck('name', 'id'))

            ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.name'),
                TextColumn::make('member.name'),
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
            'index' => Pages\ListProjectMembers::route('/'),
            'create' => Pages\CreateProjectMember::route('/create'),
            'edit' => Pages\EditProjectMember::route('/{record}/edit'),
        ];
    }
}
