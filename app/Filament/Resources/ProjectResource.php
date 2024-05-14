<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\DatePicker;

use Filament\Forms\Components\Textarea;

use Filament\Forms\Components\Select;

use Filament\Forms\Components\FileUpload;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\RichEditor;

use Filament\Tables\Columns\DateColumn;

use Filament\Tables\Columns\BooleanColumn;

use Filament\Tables\Actions\Action;

use Filament\Tables\Actions\BulkActionGroup;

use Filament\Tables\Actions\EditAction;

use Filament\Tables\Actions\DeleteBulkAction;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'Project Management';
   
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([

            TextInput::make('name')

                ->required()

                ->maxLength(255),


            DatePicker::make('start_date')

                ->required(),


            DatePicker::make('end_date')

                ->required(),


            RichEditor::make('description')

                ->required(),


            Select::make('status')

                ->required()

                ->options([

                    'active' => 'Active',

                    'inactive' => 'Inactive',

                    'completed' => 'Completed',

                ]),


            FileUpload::make('photo')
                ->avatar()
                ->imageEditor()
                ->required()

                ->image()

                ->maxSize(1024 * 1024 * 5), // 5MB


            TextInput::make('budget')

                ->required()

                ->step(0.01)

                ->minValue(0)

                ->maxValue(1000000),


            TextInput::make('estimated_hours')

                ->required()

                ->minValue(0)

                ->maxValue(10000),


            TextInput::make('tags')

                ->required()

                ->maxLength(255),


            TextInput::make('progress')

                ->required()

                ->minValue(0)

                ->maxValue(100),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')

                ->sortable()

                ->searchable(),


                TextColumn::make('start_date')

                ->sortable(),

             


                TextColumn::make('end_date')

                ->sortable(),

            


        


            SelectColumn::make('status')

        

                ->options([

                    'active' => 'Active',

                    'inactive' => 'Inactive',

                    'completed' => 'Completed',

                ]),


            TextColumn::make('budget')

                ->sortable(),


            TextColumn::make('estimated_hours')

                ->sortable(),


           


            TextColumn::make('progress')

                ->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
