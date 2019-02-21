<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 20:39
 */

namespace App\Interfaces;


interface ICurrencyService
{
    public function getCurrencies();
    public function save();
    public function convert($currencies);
}