<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalStockValue = Product::sum(\DB::raw('stok * harga_beli'));
        $lowStockProducts = Product::where('stok', '<', 10)->count();
        
        return [
            Stat::make('Total Produk', $totalProducts)
                ->description('Jumlah produk terdaftar')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),
            
            Stat::make('Total Transaksi', $totalTransactions)
                ->description('Semua transaksi')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info'),
            
            Stat::make('Nilai Stok', 'Rp ' . number_format($totalStockValue, 0, ',', '.'))
                ->description('Total nilai stok')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),
            
            Stat::make('Stok Rendah', $lowStockProducts)
                ->description('Produk dengan stok < 10')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),
        ];
    }
}
