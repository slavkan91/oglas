<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    //
    protected $fillable = ['name'];

    public function oglasi(){
        return $this->hasMany('App\Oglas');
    }
}
