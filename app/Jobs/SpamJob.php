<?php

namespace App\Jobs;

use App\library\ISocialClient;
use App\library\spammer\Spammer;
use App\library\spammer\UserSpammer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;


class SpamJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private UserSpammer $spammer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( UserSpammer $userSpammer )
    {
        $this->spammer = $userSpammer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->spammer->spam();
    }
}
