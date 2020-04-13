<?php


namespace App\library\spammer;

use Illuminate\Contracts\Queue\QueueableCollection;

class MassSpammSender
{

    private QueueableCollection $users;
    private array $socialClients;

    public function __construct(QueueableCollection $users, array $socialClients)
    {
        $this->users = $users;
        $this->socialClients = $socialClients;
    }

    public function send(){
        foreach ($this->users as $user){
            foreach ($this->socialClients as $socialClient){
                ( new UserSpammer($user, $socialClient) ) -> spam();
            }
        }
    }

}