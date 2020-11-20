<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Goutte;
use Illuminate\Support\Facades\Log;

class GetDribbbleShotsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("CRON");
        $ids = DB::table('users')->pluck('id');
        // var_dump($ids);
        foreach ($ids as $id) {
            $url = DB::table('users')
                ->where('id', $id)->value('dribbble_url');
            // var_dump($url);
            if ($url) {
                $crawler = Goutte::request('GET', $url);
                $shots = $crawler->filter('.shot-thumbnail')->count();
                // var_dump($shots);
                if ($shots > 0) {
                    if ($shots == 1) {
                        $images = $crawler->filter('figure > img')->attr("src");
                    } else {
                        for ($i = 0; $i < $shots; $i++) {
                            $images[] = $crawler->filter('figure > img')->eq($i)->attr("src");
                        };
                        $images = implode(',', $images);
                    }
                    // var_dump($images);
                    DB::table('users')
                        ->where('id', $id)
                        ->update(['portfolio' => $images]);
                }
            }
        };
    }
}