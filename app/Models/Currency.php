<?php

namespace App\Models;

use App\Interfaces\ICurrencyModel;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model implements ICurrencyModel
{
    protected $table = 'currency';
    protected $fillable = ['key','value','provider'];

    public function getCurrencyKey()
    {
        return $this->attributes['key'];
    }

    public function setCurrencyKey($key)
    {
        $this->attributes['key'] = strtolower($key);
    }

    public function getCurrencyAmount()
    {
        return $this->attributes['value'];
    }

    public function setCurrencyAmount($value)
    {
        $this->attributes['value'] = strtolower($value);
    }

    public function getCurrencyProvider()
    {
       return $this->attributes['provider'];
    }

    public function setCurrencyProvider($provider)
    {
        $this->attributes['provider'] = strtolower($provider);
    }

}
