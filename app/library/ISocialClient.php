<?php


namespace App\library;


use App\library\http\Response;
use App\User;

interface ISocialClient
{
    public function sendMsgToUserByID(string $msg, int $userID) : Response;
    public function sendMsgToUser(string $msg, User $user) : Response;
}