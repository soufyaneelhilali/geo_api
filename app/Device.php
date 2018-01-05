<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use ModelUtility;
    protected $fillable= ['id','imei','name','user_id','realtimecategory_id','public'];

    protected $relations = ['user','category'];
    protected $with = ['category'];

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
    public function category ()
    {
        return $this->hasOne('App\RealtimeCategory','id','realtimecategory_id');
    }
}
