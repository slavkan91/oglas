<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oglas extends Model
{
    //
    protected $fillable = [
        'kategorija_id',
        'user_id',
        'ime',
        'cijena',
        'kilometraza',
        'godiste',
        'slika',
        'odobreno'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function kategorija(){
        return $this->belongsTo('App\Kategorija');
    }





}
