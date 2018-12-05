<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable=['title','content','user_id','channel_id'];
    public function channel(){
        return $this->belongsTo('App\Channel');
    }
    public function user(){
        $this->belongsTo('App\User');
    }
    public function replies(){
        $this->hasMany('App\Replies');
    }
}