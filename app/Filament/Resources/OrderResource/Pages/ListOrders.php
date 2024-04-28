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
        'new' => Tab::make('New Orders', fn ($query) => $query->where('status', 'new')),
        'processing' => Tab::make('Processing Orders', fn ($query) => $query->where('status', 'processing')),
        'shipped' => Tab::make('Shipped Orders', fn ($query) => $query->where('status', 'shipped')),
        'delivered' => Tab::make('Delivered Orders', fn ($query) => $query->where('status', 'delivered')),
        'cancelled' => Tab::make('Cancelled Orders', fn ($query) => $query->where('status', 'cancelled')),
    ];
}
}
