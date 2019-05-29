<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValorCampo extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function etapa()
    {
        return $this->belongsTo('App\Etapa');
    }

    public function campo()
    {
        return $this->belongsTo('App\Campo');
    }
}
