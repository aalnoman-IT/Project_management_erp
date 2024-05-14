<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskStageResource\Pages;
use App\Filament\Resources\TaskStageResource\RelationManagers;
use App\Models\TaskStage;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\DatePicker;

use Filament\Forms\Components\Textarea;

use Filament\Forms\Components\Select;

use Filament\Forms\Components\FileUpload;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskStageResource extends Resource
{
    protected static ?string $model = TaskStage::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationGroup = 'Task Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')

            ->required(),

             

            Select::make('project_id')

            ->label('Project')

            ->options(Project::all()->pluck('name', 'id'))

            ->required(),


            Select::make('status')

                ->required()

                ->options([

                    'active' => 'Active',

                    'inactive' => 'Inactive',

                    'completed' => 'Completed',

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')

                ->sortable()

                ->searchable(),
                TextColumn::make('project.name')

                ->sortable()

                ->searchable(),
                SelectColumn::make('status')

        

                ->options([

                    'active' => 'Active',

                    'inactive' => 'Inactive',

                    'completed' => 'Completed',

                ]),

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
            'index' => Pages\ListTaskStages::route('/'),
            'create' => Pages\CreateTaskStage::route('/create'),
            'edit' => Pages\EditTaskStage::route('/{record}/edit'),
        ];
    }
}
