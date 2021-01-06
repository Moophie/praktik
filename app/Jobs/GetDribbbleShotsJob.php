<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
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
        // Get all user ids from database
        $ids = User::pluck('id');

        foreach ($ids as $id) {
            // Get dribbble urls from each user id
            $url = User::where('id', $id)->value('dribbble_url');

            if ($url) {
                // Scrape dribbble url
                $client = new Client();
                $crawler = $client->request('GET', $url);
                $shots = $crawler->filter('.shot-thumbnail')->count();

                if ($shots > 0) {
                    if ($shots == 1) {
                        $images = $crawler->filter('figure > img')->attr("src"); // Get the picture
                    } else {
                        for ($i = 0; $i < 4; $i++) { // Only get the 4 most recent pictures
                            $images[] = $crawler->filter('figure > img')->eq($i)->attr("src"); // Save the pictures in an array
                        };
                        $images = implode(',', $images); // Convert the array to string
                    }

                    User::where('id', $id)
                        ->update(['portfolio' => $images]); // Save pictures urls in the database
                }
            }
        };
    }
}
