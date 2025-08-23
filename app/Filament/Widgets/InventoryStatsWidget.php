<?php

namespace App\Filament\Widgets;


use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class InventoryStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', \App\Models\Product::count())
                ->description('Jumlah produk dalam sistem')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary'),
            
            Stat::make('Total Supplier', \App\Models\Supplier::count())
                ->description('Jumlah supplier terdaftar')
                ->descriptionIcon('heroicon-m-truck')
                ->color('success'),
            
            Stat::make('Transaksi Bulan Ini', \App\Models\Transaction::whereMonth('created_at', now()->month)->count())
                ->description('Jumlah transaksi bulan ini')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('warning'),
                
            Stat::make('Nilai Inventori', function() {
                return 'Rp ' . number_format(\App\Models\Product::sum(DB::raw('stok * harga_beli')), 0, ',', '.');
            })
                ->description('Total nilai inventori saat ini')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('danger'),
        ];
    }
}
