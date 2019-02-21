<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 22:30
 */

namespace App\Http\Controllers\Config;


class CurrencyTypes
{
    public function all()
    {
        return ['USD', 'EUR', 'GBP'];
    }
}
