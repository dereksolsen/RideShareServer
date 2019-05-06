<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    public function history(){
        return $this->belongsTo('App\History');
    }
}
