<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $primaryKey = 'codCli';
    protected $guarded = ['codCli'];

    public function produtos()
    {
        return $this->belongsToMany('App\Models\Produto');
    }


}
