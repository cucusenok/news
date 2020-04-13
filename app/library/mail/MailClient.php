<?php


namespace App\library\mail;

use App\library\http\Response;
use App\library\ISocialClient;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;


class MailClient implements ISocialClient
{

    private string $senderMail;

    public function __construct()
    {
        //TODO: CHECK EXISTING MAIL CONFIGURATION
        $this->senderMail = env('MAIL_USERNAME');
    }

    public function sendMsgToUser(string $msg, User $user): Response
    {
        Mail::raw('Hello' . $user->name, function ($message) use ($user) {
            $message->from($this->senderMail , 'Cucusenok');

            $message->to($user->email )->cc($this->senderMail);
        });

        return new Response(200);
    }

    public function sendMsgToUserByID(string $msg, int $userID): Response
    {
        // TODO: Implement sendMsgToUserByID() method.
    }

}