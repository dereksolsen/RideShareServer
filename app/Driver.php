<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone_number', 'rating', 'history', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
    
    public function requests(){
        return $this->hasMany('App\ServiceableRequests');
    }
    
    public function rating(){
        $ratings = History::with('Rating')->where('driver_id',$this->id)->get()->all();
        $sum = 0;
        $count = 0;
        foreach($ratings as $rating){
            $sum = $sum + $rating['rating']['client_rating'];
            $count++;
        }
        if($count > 0){
            $average = $sum/$count;
        }else{
            $average = null;
        }
        return $average;
    }
    
    public function ratings(){
        return $this->hasManyThrough('App\Rating', 'App\History');
    }
}
