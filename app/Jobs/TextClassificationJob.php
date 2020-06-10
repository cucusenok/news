<?php


namespace App\Jobs;


use App\Category;
use App\library\spammer\UserSpammer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\library\classification\IClassificationService;

class TextClassificationJob implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private IClassificationService $classificationService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( IClassificationService $classificationService )
    {
        $this->classificationService = $classificationService;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result =  $this->classificationService->classify()->getBody();
        $result = json_decode(json_decode($result));

        foreach($result->predicts as $predict){
            Category::firstOrCreate(
                ['name' => $predict->class ],
                ['description' => $predict->class ]
            );
        }
    }


}
