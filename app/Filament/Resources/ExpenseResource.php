<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
use App\Models\Task;
use App\Models\Project;

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

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-document-minus';

    protected static ?string $navigationGroup = 'Financial Activities';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            TextInput::make('name')

            ->required()

            ->maxLength(255),

            DatePicker::make('date')

                ->required(),

            TextInput::make('amount')

            ->required()

            ->numeric(),

            Select::make('project_id')

            ->label('Project')

            ->options(Project::all()->pluck('name', 'id'))

            ->required(),

            Select::make('task_id')

            ->label('Task')

            ->options(Task::all()->pluck('name', 'id'))

            ->required(),

          

            RichEditor::make('description')

                ->required()
                ->columns(2),

            

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('date'),
                TextColumn::make('amount'),
                TextColumn::make('project.name'),
                TextColumn::make('task.name'),
              
                
            

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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
