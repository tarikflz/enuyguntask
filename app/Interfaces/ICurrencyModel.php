<?php
/**
 * Created by PhpStorm.
 * User: evilbyte
 * Date: 20.02.2019
 * Time: 21:33
 */

namespace App\Interfaces;


interface ICurrencyModel
{
    public function getCurrencyKey();
    public function setCurrencyKey($key);
    public function getCurrencyAmount();
    public function setCurrencyAmount($key);
    public function getCurrencyProvider();
    public function setCurrencyProvider($key);

}