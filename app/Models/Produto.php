<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    
    protected $primaryKey = 'codProd';
    protected $guarded = ['codProd'];

    public function clientes()
    {
        return $this->belongsToMany('App\Models\Cliente');
    }

}
