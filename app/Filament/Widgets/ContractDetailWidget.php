<?php

namespace App\Filament\Widgets;

use App\Models\Contract;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ContractDetailWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Latest Contract List';
    public function table(Table $table): Table
    {
        return $table
            ->query(Contract::query() )
            ->defaultSort('created_at','desc')
            ->columns([
                TextColumn::make('project.name'),
              
                TextColumn::make('member.name')
                ->label('Client'),
                TextColumn::make('subject'),
                TextColumn::make('value'),
                TextColumn::make('milestone.name'),
            ]);
    }
}
