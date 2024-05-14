<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MilestoneResource\Pages;
use App\Filament\Resources\MilestoneResource\RelationManagers;
use App\Models\Milestone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Models\Project;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\ProgressColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class MilestoneResource extends Resource
{
    protected static ?string $model = Milestone::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationGroup = 'Project Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([

            Select::make('project_id')

                ->label('Project')

                ->options(Project::all()->pluck('name', 'id'))

                ->required(),


            TextInput::make('name')

                ->label('Name')

                ->required(),


            Select::make('status')

                ->label('Status')

                ->options([

                    'not_started' => 'Not Started',

                    'in_progress' => 'In Progress',

                    'completed' => 'Completed',

                ])

                ->required(),


            TextInput::make('progress')

                ->label('Progress')

                ->numeric()

                ->required(),


            Textarea::make('description')

                ->label('Description'),


            DatePicker::make('start_date')

                ->label('Start Date')

                ->required(),
            DatePicker::make('end_date')

                ->label('End Date')

                ->required(),


            


          

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('name')

                ->sortable()

                ->searchable(),


            TextColumn::make('project.name'),


            TextColumn::make('end_date')

                ->sortable(),

             


            TextColumn::make('start_date')

                ->sortable(),

               


            SelectColumn::make('status')

                ->options([

                    'not_started' => 'Not Started',

                    'in_progress' => 'In Progress',

                    'completed' => 'Completed',

                ]),



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
            'index' => Pages\ListMilestones::route('/'),
            'create' => Pages\CreateMilestone::route('/create'),
            'edit' => Pages\EditMilestone::route('/{record}/edit'),
        ];
    }
}
