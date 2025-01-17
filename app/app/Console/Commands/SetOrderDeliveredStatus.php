<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SetOrderDeliveredStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:set-order-delivered-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set order delivered status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oneDayAgo = Carbon::now()->subDay();

        $orderToDeliver = Order::where('created_at', '<', $oneDayAgo)->get();

        if($orderToDeliver->isEmpty()){
            $this->info('Заказы еще не доставлены');
            Log::info("Заказы еще не доставлены");
            return;
        }

        foreach($orderToDeliver as $order){
            $order->status = "Delivered";
            $order->save();
            $this->info("Заказ ID: $order->id доставлен");
        }
    }
}
