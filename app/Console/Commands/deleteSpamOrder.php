<?php

namespace App\Console\Commands;

use App\Helpers\Constant;
use App\Models\Order;
use App\Models\OrderOffers;
use Illuminate\Console\Command;

class deleteSpamOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $order_offer = OrderOffers::pluck('order_id');
        $orders = Order::whereNotIn('id', $order_offer)->get();
        foreach ($orders as $order){
            if ($order->getOrderTime()->diffInMinutes() > 10 ){
                $order->delete();
            }
        }
    }
}
