<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Booking;

class UpdateExpiredBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:Booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update/invalidate expired booking';

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
        $now = Carbon::now()->format('Y-m-d H:i:s');       
        
        $book = Booking::where('expired_time', '<=', $now)
        ->where('status', 0)
        ->update(['status' => 2]);

        $this->info('Successfully update expired booking.');
    }
}
