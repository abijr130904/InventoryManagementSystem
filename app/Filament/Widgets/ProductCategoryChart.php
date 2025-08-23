<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProductCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Kategori Produk';
    
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Product::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();

        $colors = [
            'Elektronik' => '#3B82F6',
            'Pakaian' => '#EF4444',
            'Makanan' => '#10B981',
            'Minuman' => '#F59E0B',
            'Lainnya' => '#8B5CF6',
        ];

        return [
            'datasets' => [
                [
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => $data->map(fn($item) => $colors[$item->kategori] ?? '#6B7280')->toArray(),
                ],
            ],
            'labels' => $data->pluck('kategori')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
