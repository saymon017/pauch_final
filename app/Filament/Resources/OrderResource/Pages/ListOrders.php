<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\Filter;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStats::class
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('new')
                ->query(fn ($query) => $query->where('status', 'new'))
                ->label('New Orders'),

            Filter::make('processing')
                ->query(fn ($query) => $query->where('status', 'processing'))
                ->label('Processing Orders'),

            Filter::make('shipped')
                ->query(fn ($query) => $query->where('status', 'shipped'))
                ->label('Shipped Orders'),

            Filter::make('delivered')
                ->query(fn ($query) => $query->where('status', 'delivered'))
                ->label('Delivered Orders'),

            Filter::make('cancelled')
                ->query(fn ($query) => $query->where('status', 'cancelled'))
                ->label('Cancelled Orders'),
        ];
    }
}
