<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;

class RealtimeCategory extends Model
{
    use ModelUtility;
    protected $fillable = ['id','name','description','icon','image'];
    protected $relations = ['devices'];

    public function devices()
    {
        return $this->hasMany('App\Device','realtimecategory_id','id');
    }

}
