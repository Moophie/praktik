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
        $url = DB::table('users')
            ->where('id', 1)->pluck('dribbble_url');
        var_dump($url);
        // Auth::user()->id
        // $crawler = Goutte::request('GET', $url);
        // $shots = $crawler->filter('.shot-thumbnail')->count();
        // for ($i = 0; $i < $shots; $i++) {
        //     $images[] = $crawler->filter('figure > img')->eq($i)->attr("src");
        // };
        // $images = implode(',', $images);
        // var_dump($images);
        // DB::table('users')
        //     ->where('id', Auth::user()->id)
        //     ->update(['portfolio' => $images]);
    }
}
