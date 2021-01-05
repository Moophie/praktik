<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Goutte\Client;
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
        // get all user ids from database
        $ids = \App\Models\User::pluck('id');
        // var_dump($ids);
        foreach ($ids as $id) {
            // get dribbble urls from each user id
            $url = \App\Models\User::where('id', $id)->value('dribbble_url');
            // var_dump($url);
            if ($url) {
                // scrape dribbble url
                $client = new Client();
                $crawler = $client->request('GET', $url);
                $shots = $crawler->filter('.shot-thumbnail')->count();
                // var_dump($shots);
                if ($shots > 0) {
                    if ($shots == 1) {
                        $images = $crawler->filter('figure > img')->attr("src"); // get picture
                    } else {
                        for ($i = 0; $i < 4; $i++) { // 4 most recent pics
                            $images[] = $crawler->filter('figure > img')->eq($i)->attr("src"); // save pictures in array
                        };
                        $images = implode(',', $images); // convert array to string
                    }
                    // var_dump($images);
                    \App\Models\User::where('id', $id)
                        ->update(['portfolio' => $images]); // save pictures urls in database
                }
            }
        };
    }
}
