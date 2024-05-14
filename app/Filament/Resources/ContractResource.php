<?php

namespace App\Filament\Resources;
use Livewire\Component as Livewire;
use App\Filament\Resources\ContractResource\Pages;
use App\Filament\Resources\ContractResource\RelationManagers;
use App\Models\Contract;
use App\Models\Member;
use App\Models\Project;
use App\Models\Milestone;
use Filament\Forms\Get;
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

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Financial Activities';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            Select::make('project_id')

            ->label('Project')
            ->options(Project::pluck('name', 'id'))
            ->required()
            ->reactive(),


            Select::make('member_id')

            ->label('Client')

            ->options(Member::query()->where('role_id', 5)->pluck('name', 'id'))

            ->required(),

            TextInput::make('subject')

            ->required()

            ->maxLength(255),

            TextInput::make('value')

            ->required()

            ->numeric(),


            Select::make('milestone_id')
            ->label('Milestone')
            ->disabled(fn (Get $get) : bool => ! filled($get('project_id')))
            ->options(fn(Get $get) => Milestone::where('project_id', (int) $get('project_id'))->pluck('name', 'id'))
            ->required(),

    
            DatePicker::make('start_date')

                ->required(),


            DatePicker::make('end_date')

                ->required(),
            TextInput::make('notes')

            ->required()

            ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project.name'),
              
                TextColumn::make('member.name')
                ->label('Client'),
                TextColumn::make('subject'),
                TextColumn::make('value'),
                TextColumn::make('milestone.name'),
                TextColumn::make('start_date')

                ->sortable(),

                TextColumn::make('end_date')

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
            'index' => Pages\ListContracts::route('/'),
            'create' => Pages\CreateContract::route('/create'),
            'edit' => Pages\EditContract::route('/{record}/edit'),
        ];
    }
}
