<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use App\Models\Member;
use App\Models\Project;
use Filament\Forms\Get;
use App\Models\Milestone;
use App\Models\TaskStage;
use Filament\Forms;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\DatePicker;

use Filament\Forms\Components\Textarea;

use Filament\Forms\Components\Select;

use Filament\Forms\Components\FileUpload;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\RichEditor;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-check';

    protected static ?string $navigationGroup = 'Task Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

       
            TextInput::make('name')

            ->required()

            ->maxLength(255),
            TextInput::make('progress')

            ->required()

            ->numeric(),

            RichEditor::make('description')
            ->required()
            ->columnSpan(2),

            TextInput::make('estimated_hours')

            ->required()

            ->minValue(0)

            ->maxValue(10000),

            DatePicker::make('start_date')

                ->required(),


            DatePicker::make('end_date')

                ->required(),

            Select::make('member_id')

            ->label('Member')

            ->options(Member::query()->where('role_id', 4)->pluck('name', 'id'))

            ->required(),

            Select::make('project_id')

            ->label('Project')

            ->options(Project::all()->pluck('name', 'id'))
            ->reactive()

            ->required(),

            Select::make('milestone_id')
            ->label('Milestone')
            ->disabled(fn (Get $get) : bool => ! filled($get('project_id')))
            ->options(fn(Get $get) => Milestone::where('project_id', (int) $get('project_id'))->pluck('name', 'id'))
            ->required(),


            Select::make('stage_id')

            ->label('Task Stage')

            ->disabled(fn (Get $get) : bool => ! filled($get('project_id')))
            ->options(fn(Get $get) => TaskStage::where('project_id', (int) $get('project_id'))->pluck('name', 'id'))

            ->required(),
           

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

                TextColumn::make('start_date')

                ->sortable(),

                TextColumn::make('end_date')

                ->sortable(),

                TextColumn::make('project.name'),
              
                TextColumn::make('milestone.name'),
                TextColumn::make('taskstage.name'),
                TextColumn::make('progress')

        
            

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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
