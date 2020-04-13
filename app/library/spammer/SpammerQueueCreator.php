<?php


namespace App\library\spammer;

use App\Jobs\SpamJob;
use Illuminate\Contracts\Queue\QueueableCollection;


class SpammerQueueCreator
{
    private QueueableCollection $users;
    private array $socialClients;

    public function __construct(QueueableCollection $users, array $socialClients)
    {
       $this->users = $users;
       $this->socialClients = $socialClients;
    }

    public function create(){
        foreach ($this->users as $user){
            foreach ($this->socialClients as $socialClient){
                dispatch(
                    new SpamJob(
                        new UserSpammer($user, $socialClient)
                    )
                );
            }
        }
    }


}