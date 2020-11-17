<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    public function factures()
    {
        return $this->hasMany('App\Facture');
    } 
}