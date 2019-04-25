<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceableRequests extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'driver_id' , 'status', 'destination_address', 'pick_up_address', 'estimated_length', 'time', 'date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    
    public function driver(){
        return $this->belongsTo('App\Driver');
    }
    
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
