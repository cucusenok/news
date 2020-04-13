<?php


namespace App\library\telegram;


use App\library\http\IHttpClient;
use App\library\http\Response;
use App\User;
use Illuminate\Support\Facades\App;
use App\library\ISocialClient;

class TelegramClient implements ISocialClient
{

    private IHttpClient $httpClient;
    private string $token;
    //private string $apiVersion;
    private string $queryPrefix;

    private $protocol = 'http://';

    //private $baseUrl = 'api.telegram.org';

    /** @var string временный прокси на api.telegram.org */
    private string $baseUrl = 'telegram.w.ibrush.ru';

    private string $apiMethodPrefix = 'method';
    private string $botPrefix = 'bot';

    const METHOD_MSG_SEND = 'sendMessage';


    public function __construct(IHttpClient $httpClient)
    {
        /**
         * Нарошно не обрабатываем
         * До логирования
         */
        $this->loadConfiguration();
        $this->httpClient = $httpClient;
    }


    private function getDevToken(){
        if( !env('TELEGRAM_API_TOKEN'))
            throw new \Exception(
                trans('messages.vk_local_config_not_found') . 'TELEGRAM_API_TOKEN'
            );

        return env('TELEGRAM_API_TOKEN');
    }


    /**
     * Function for sending message to user
     * @param string $msg
     * @param User $user
     * @return Response
     */
    public function sendMsgToUser(string $msg, User $user) : Response {
        $params = [ 'text'=> $msg, 'chat_id' => $user->telegram->networkID ];
        return $this->callMethod(self::METHOD_MSG_SEND, $params );
    }


    /**
     * Function for sending message to user
     * @param string $msg
     * @param int $userID
     * @return Response
     */
    public function sendMsgToUserByID(string $msg, int $userID) : Response {
        $params = [ 'text'=> $msg, 'chat_id' => $userID ];
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
            $this->token = $this->getDevToken();
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
        return $this->protocol . $this->baseUrl . '/' . $this->botPrefix . $this->token . '/' . $method . '?' . http_build_query($params);
    }

}