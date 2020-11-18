<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GetDribbbleShotsJob;

class GetDribbbleShots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_dribbble_shots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get user dribble shots from his profile url';

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
        GetDribbbleShotsJob::dispatch();
    }
}
