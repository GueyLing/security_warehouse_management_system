<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Models\Stock;
use App\Models\User;

class AutoLowStockAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:lowstockalert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send low stock alert email automatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('role', '=','warehouse_staff')->orWhere('role', '=','purchasing_staff')->get();
        $stocks = Stock::whereRaw('quantity < low_stock_alert')->get();
        if (!$stocks->isEmpty()) {
            foreach ($users as $user) {
            Mail::to($user->email)->send(new NotifyMail($stocks));
            }
        }
        
        return 0;
    }
}
