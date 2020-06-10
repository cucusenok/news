<?php
declare(strict_types=1);

namespace App\library\vk;

use App\library\http\IHttpClient;
use Illuminate\Support\Facades\App;
use App\library\http\Response;
use App\library\ISocialClient;
use App\User;

class VkClient implements ISocialClient
{
    private IHttpClient $httpClient;

    private string $token;
    private string $apiVersion;
    private string $queryPrefix;

    private string $protocol = 'https://';
    private string $baseUrl = 'api.vk.com';
    private string $apiMethodPrefix = 'method';

    const METHOD_URL = 'https://api.vk.com/method/';
    const METHOD_MSG_SEND = 'messages.send';


    public function __construct(IHttpClient $httpClient)
    {
        //Нарошно не обрабатываем
        $this->loadConfiguration();
        $this->httpClient = $httpClient;
    }


    /**
     * Function for sending message to user
     * @param string $msg
     * @param int $userID
     * @return Response
     */
    public function sendMsgToUser(string $msg, User $user) : Response {
        $params = [ 'message'=> $msg, 'user_id' => $user->vk->networkID ];
        return $this->callMethod(self::METHOD_MSG_SEND, $params );
    }


    /**
     * Function for sending message to user
     * @param string $msg
     * @param int $userID
     * @return Response
     */
    public function sendMsgToUserByID(string $msg, int $userID) : Response {
        $params = [ 'message'=> $msg, 'user_id' => $userID ];
        return $this->callMethod(self::METHOD_MSG_SEND, $params );
    }

    /**
     * Function for calling method of vk api
     * @param string $method
     * @param array $params
     * @return Response
     */
    private function callMethod(string $method, array $params) : Response{
        $queryUrl = $this->getQueryUrl($method, $params);

        return $this->httpClient->get($queryUrl);
    }

    /**
     * Function for loading vk api configuration
     * @throws \Exception
     */
    private function loadConfiguration() : void {

        if(App::environment('local')){

            if( !env('VK_GROUP_TOKEN') or !env('VK_API_VERSION') )
            throw new \Exception(
                trans('messages.vk_local_config_not_found') . 'VK_GROUP_TOKEN, VK_API_VERSION'
            );

            $this->token = env('VK_GROUP_TOKEN');
            $this->apiVersion = env('VK_API_VERSION');

            return;
        }

    }


    /**
     * Function for building query params string
     * for vk api
     * @param string $method - name of method vk api
     * @param array $params - get params
     * @return string
     */
    private function getQueryUrl(string $method, array $params):string{
        $params['access_token'] = $this->token;
        $params['v'] = $this->apiVersion;

        return self::METHOD_URL . $method . '?' . http_build_query($params);
    }



}
