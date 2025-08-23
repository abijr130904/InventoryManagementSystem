<?php

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        $product = $transaction->product;
        
        if ($transaction->type === 'masuk') {
            // Jika barang masuk, tambahkan stok
            $product->stok += $transaction->jumlah;
        } elseif ($transaction->type === 'keluar') {
            // Jika barang keluar, kurangi stok
            $product->stok -= $transaction->jumlah;
        }
        
        $product->save();
    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        // Jika transaksi diupdate, kembalikan stok ke nilai sebelumnya
        // dan update dengan nilai baru
        if ($transaction->isDirty('jumlah') || $transaction->isDirty('type') || $transaction->isDirty('product_id')) {
            $product = $transaction->product;
            $oldProduct = null;
            
            // Jika product_id berubah, ambil produk lama
            if ($transaction->isDirty('product_id') && $transaction->getOriginal('product_id')) {
                $oldProduct = \App\Models\Product::find($transaction->getOriginal('product_id'));
            }
            
            // Kembalikan stok produk lama jika ada
            if ($oldProduct) {
                if ($transaction->getOriginal('type') === 'masuk') {
                    $oldProduct->stok -= $transaction->getOriginal('jumlah');
                } elseif ($transaction->getOriginal('type') === 'keluar') {
                    $oldProduct->stok += $transaction->getOriginal('jumlah');
                }
                $oldProduct->save();
            } else {
                // Kembalikan stok produk yang sama
                if ($transaction->getOriginal('type') === 'masuk') {
                    $product->stok -= $transaction->getOriginal('jumlah');
                } elseif ($transaction->getOriginal('type') === 'keluar') {
                    $product->stok += $transaction->getOriginal('jumlah');
                }
            }
            
            // Update stok dengan nilai baru
            if ($transaction->type === 'masuk') {
                $product->stok += $transaction->jumlah;
            } elseif ($transaction->type === 'keluar') {
                $product->stok -= $transaction->jumlah;
            }
            
            $product->save();
        }
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        $product = $transaction->product;
        
        // Kembalikan stok ke nilai sebelum transaksi
        if ($transaction->type === 'masuk') {
            $product->stok -= $transaction->jumlah;
        } elseif ($transaction->type === 'keluar') {
            $product->stok += $transaction->jumlah;
        }
        
        $product->save();
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
