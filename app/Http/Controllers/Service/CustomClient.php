<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 20:44
 */

namespace App\Http\Controllers\Service;


use GuzzleHttp\Client;


class CustomClient
{
    private $client;

    public function __construct()
    {
        $this->setClient(new Client());
    }
    public function consumeApi($method = 'GET',$uri = null,$headers = array()){
        try {
            $response = $this->getClient()->request($method,$uri);
            return json_decode($response->getBody()->read(9999));
        }catch(\Exception $exception){
            /* @todo logging exception */
        }
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }

}