<?php

namespace App\Listeners;

use App\Events\OrderUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateOrderStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderUpdated $event): void
    {
        $order = $event->order;

        $order->status = 'In Progress';
        $order->save();
        Log::info("Заказ #{$order->id} был обновлен. Status: $order->status");
    }
}
