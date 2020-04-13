<?php


namespace App\library\spammer;


use App\User;
use App\library\ISocialClient;

class UserSpammer
{

    private User $user;
    private ISocialClient $socialClient;

    public function __construct(User $user, ISocialClient $socialClient)
    {
        $this->user = $user;
        $this->socialClient = $socialClient;
    }


    public function spam(){
        return $this->socialClient->sendMsgToUser( 'Hello, ' . $this->user->name, $this->user);
    }

}