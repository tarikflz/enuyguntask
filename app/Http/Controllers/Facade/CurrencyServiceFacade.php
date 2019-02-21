<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 23:33
 */

namespace App\Http\Controllers\Facade;


use App\Http\Controllers\Api\MockServiceApi;
use App\Interfaces\ICurrencyService;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;

class CurrencyServiceFacade
{
    public function update(ICurrencyService $currencyService){
        $currencyService->save();
    }
}
