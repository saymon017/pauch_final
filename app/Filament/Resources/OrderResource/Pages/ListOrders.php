<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Pages\ListRecords;

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

    public function getTabs(): array
    {
        return [
            null => Tab::make('ALL'),
            'new' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'processing' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'shipped' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'delivered' => Tab::make()->query(fn ($query) => $query->where('status', 'delivered')),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }
}
