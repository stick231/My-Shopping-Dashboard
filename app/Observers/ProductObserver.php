<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Log::info("Продукт ID# {$product->id} Name# {$product->name} создан в {$product->created_at}");
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        Log::info("Продукт ID# {$product->id} Name# {$product->name} обновлен в {$product->updated_at}");
    }

    public function deleting(Product $product)
    {
        Order::whereHas('orderItems', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })->each(function ($order) {
            $order->delete(); 
        });
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        Log::info("Продукт ID# {$product->id} Name# {$product->name} удален в " . now());
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
