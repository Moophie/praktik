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
                    $images = [];

                    for ($i = 0; $i < 4 && $i < $shots; $i++) { // Take 4 most recent pics
                        $images[] = $crawler->filter('figure > img')->eq($i)->attr("src");
                    };
        
                    $images = implode(',', $images); // Convert array to string

                    User::where('id', $id)
                        ->update(['portfolio' => $images]); // Save pictures urls in the database
                }
            }
        };
    }
}
