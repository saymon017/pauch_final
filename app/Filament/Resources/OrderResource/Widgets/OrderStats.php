<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Str;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        $averagePrice = Order::query()->avg('grand_total') ?? 0; // Manejar null con un valor predeterminado de 0

        // Asegurarse de que estamos utilizando el formateador de moneda correcto
        $formattedAveragePrice = $this->formatCurrency($averagePrice, 'COP');

        return [
            Stat::make('New Orders', Order::query()->where('status', 'new')->count()),
            Stat::make('Order Processing', Order::query()->where('status', 'processing')->count()),
            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Average Price', $formattedAveragePrice)
        ];
    }

    protected function formatCurrency($amount, $currency)
    {
        return number_format($amount, 2) . ' ' . $currency;
    }
}
