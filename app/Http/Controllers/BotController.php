<?php


namespace App\Http\Controllers;

use App\library\http\CurlHttpAdapter;
use App\library\http\GuzzleHttpAdapter;
use App\library\http\Response;
use App\library\ISocialClient;
use App\library\mail\MailClient;
use App\library\spammer\Spammer;
use App\library\vk\VkClient;
use App\library\telegram\TelegramClient;
use Illuminate\Support\Facades\App;
use App\library\spammer\SpammerQueueCreator;
use App\User;
use App\Post;
use App\library\spammer\MassSpammSender;


class BotController
{

    public function vk(){

        $vkClient = new VkClient(new CurlHttpAdapter());

        $response = $vkClient->sendMsgToUser('Hello from Laravel, %username%', 250476354);

        return \response($response->getContent());
    }


    public function telegram(){

        $telegramClient = new TelegramClient(new GuzzleHttpAdapter());

        $response = $telegramClient->sendMsgToUser('Hello', 431393482);

        return \response($response->getContent());

    }




    public function spam(){


        $users = User::all();

        $socialsNetworkClients = array(
            new VkClient(new GuzzleHttpAdapter()),
            new TelegramClient(new GuzzleHttpAdapter()),
            new MailClient()
        );

        ( new MassSpammSender($users, $socialsNetworkClients) ) -> send();

    }


    public function queue(){

        $users = User::all();

        $socialsNetworkClients = array(
            new VkClient(new CurlHttpAdapter()),
            new TelegramClient(new CurlHttpAdapter()),
            new MailClient(),
        );

        (new SpammerQueueCreator( $users, $socialsNetworkClients )) -> create();

    }

}