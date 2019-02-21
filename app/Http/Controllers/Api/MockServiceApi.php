<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 21:54
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\CustomClient;
use App\Interfaces\ICurrencyService;
use App\Models\Currency;

class MockServiceApi extends Controller implements ICurrencyService
{
    public const constArr = array('USDTRY'=>'USD','EURTRY'=>'EUR','GBPTRY'=>'GBP');
    public function getCurrencies()
    {
        $response = null;
        try {
            $client = new CustomClient();
            $response = $client->consumeApi('GET', 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0', null);
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
        $converted = $this->convert($response->result);
        foreach($converted as $item){
            $currencyObj =  new Currency;
            $currencyObj->setCurrencyAmount($item->amount);
            $currencyObj->setCurrencyKey($item->symbol);
            $currencyObj->setCurrencyProvider('FirstMockApi');
            $currencyObj->save();
        }
        return $converted;
    }

    public function convert($currencies)
    {
       foreach($currencies as $currency){
            if(array_key_exists($currency->symbol,$this::constArr)){
                $currency->symbol = $this::constArr[$currency->symbol];
                $currency->amount = floatval($currency->amount);
            }
       }
       return $currencies;
    }


}