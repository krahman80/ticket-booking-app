<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Concert;
use Carbon\Carbon;

class UpdateExpiredConcert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:Concert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update/invalidated expired concert';

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
        $book = Concert::where('date', '<=', $now)
        ->where('expired', 0)
        ->update(['expired' => 1]);

        $this->info('Successfully update expired concert.');

    }
}
