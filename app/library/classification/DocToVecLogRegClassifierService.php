<?php


namespace App\library\classification;
use App\library\classification\IClassificationService;
use App\library\http\IHttpClient;
use App\library\http\Response;
use App\Post;
use Illuminate\Support\Facades\App;


class DocToVecLogRegClassifierService implements  IClassificationService
{

    private Post $post;
    private IHttpClient $httpClient;
    private string $applicationUrl;

    const METHOD_NAME = '/classifier/';

    public function __construct(IHttpClient $httpClient, Post $post)
    {
        $this->httpClient = $httpClient;
        $this->post = $post;

        $this->loadConfiguration();
    }


    private function loadConfiguration(){
        if(App::environment('local')){

            if( !env('CLASSIFIER_URL') or !env('CLASSIFIER_PORT') )
                throw new \Exception(
                    trans('messages.classifier_local_config_not_found') . 'CLASSIFIER_URL, CLASSIFIER_PORT'
                );

            $this->applicationUrl = env('CLASSIFIER_URL') . ':' . env('CLASSIFIER_PORT');

            return;
        }
    }


    public function classify(): Response
    {
        //var_dump($this->applicationUrl . self::METHOD_NAME . strip_tags('saggsagsagg'));die;
        return $this->httpClient->get($this->applicationUrl . self::METHOD_NAME . strip_tags('saggsagsagg'));
    }
}
