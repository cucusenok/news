<?php


namespace App\library\spammer;


use App\Jobs\SpamJob;
use App\library\http\Response;
use App\library\ISocialClient;
use App\User;
use Illuminate\Contracts\Queue\QueueableCollection;

class Spammer
{

    private QueueableCollection $users;
    private array $clients;
    private bool $needCreateQueue = false;

    /**
     * @param array ISocialClient $socialClient
     * @param array User $users
     */
    public function __construct(QueueableCollection $users = null, array $socialClients = array())
    {
        $this->users = $users;
        $this->clients = $socialClients;
    }


    /**
     * @param array ISocialClient $socialClient
     * @param array User $users
     */
    public function networksSpam(QueueableCollection $users, array $socialClients){
        foreach ($socialClients as $socialClient){
            $this->networkSpam($users, $socialClient);
        }
    }


    /**
     * @param array $users[] App
     */
    public function networkSpam(QueueableCollection $users, ISocialClient $socialClient){
        foreach ($users as $user){
            $this->userNetworkSpam($user, $socialClient);
        }
    }

    /**
     * @param User $user
     * @param ISocialClient $socialClient
     * @return Response
     */
    public function userNetworkSpam(User $user, ISocialClient $socialClient) : Response{
        if(!$this->needCreateQueue)
            return $socialClient->sendMsgToUser( 'Hello, ' . $user->name, $user );

        dispatch( new SpamJob( $user, $socialClient ) );
    }


    public function createQueue(){
        $this->needCreateQueue = true;
        $this->networksSpam($this->users, $this->clients);
    }

    public function spam(){
        $this->networksSpam($this->users, $this->clients);
    }

}