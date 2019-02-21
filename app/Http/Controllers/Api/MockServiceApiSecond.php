<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 23:27
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CustomClient;
use App\Interfaces\ICurrencyService;
use App\Models\Currency;

class MockServiceApiSecond  extends Controller implements ICurrencyService
{
    public const constArr = array('DOLAR'=>'USD','AVRO'=>'EUR','İNGİLİZ STERLİNİ'=>'GBP');
    public function getCurrencies()
    {
        $response = null;
        try {
            $client = new CustomClient();
            $response = $client->consumeApi('GET', 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3', null);
        }
        catch (\Exception $exception){
            // TODO: Implement logger
        }finally{
            return $response;
        }
    }

    public function save()
    {
        $response = $this->getCurrencies();
        $converted = $this->convert($response);
        foreach($converted as $item){
            $currencyObj =  new Currency;
            $currencyObj->setCurrencyAmount($item->oran);
            $currencyObj->setCurrencyKey($item->kod);
            $currencyObj->setCurrencyProvider('SecondMockApi');
            $currencyObj->save();
        }
        return $converted;
    }

    public function convert($currencies)
    {
        foreach($currencies as $currency){
            if(array_key_exists($currency->kod,$this::constArr)){
                $currency->kod = $this::constArr[$currency->kod];
                $currency->oran = floatval($currency->oran);
            }
        }
        return $currencies;
    }


}