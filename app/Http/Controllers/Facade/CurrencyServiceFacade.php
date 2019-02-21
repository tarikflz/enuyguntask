<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 23:33
 */

namespace App\Http\Controllers\Facade;


use App\Interfaces\ICurrencyService;

class CurrencyServiceFacade
{
    public function update(ICurrencyService $currencyService)
    {
        $currencyService->save();
    }
}
