<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'name', 'cnpj'
    ];

    public function valorcampos()
    {
        return $this->hasMany('App\ValorCampo');
    }
}
