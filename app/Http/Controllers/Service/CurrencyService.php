<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 20:51
 */

namespace App\Http\Controllers\Service;


use App\Http\Controllers\Api\MockServiceApi;
use App\Http\Controllers\Api\MockServiceApiSecond;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Facade\CurrencyServiceFacade;
use Illuminate\Support\Facades\DB;

class CurrencyService extends Controller
{
    public function test()
    {
        /*  $a1 = new MockServiceApi();
          $a2 = new MockServiceApiSecond();
         $test = new CurrencyServiceFacade();
         var_dump($test->findLowestCurrencies());*/
        return $this->getAllCurrencies();
    }

    public function getAllCurrencies()
    {
        $currency = DB::table('currency as t1')->leftJoin('currency as t2', function ($join) {
            $join->on('t1.key', '=', 't2.key');
            $join->on('t1.value', '>', 't2.value');
        })->where('t2.value', '!=', null)->get()->unique('key');
        return json_encode($currency);
    }

    public function getUpdatedCurrencies()
    {
        try {
            $mockService1 = new MockServiceApi();
            $mockService2 = new MockServiceApiSecond();
            $facade = new CurrencyServiceFacade();
            $facade->update($mockService1);
            $facade->update($mockService2);
            return 'OK';
        } catch (\Exception $exception) {
            // TODO: Implement logger
        }
    }
}
