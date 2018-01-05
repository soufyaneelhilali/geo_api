<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;

class Upfile extends Model
{
    use ModelUtility;
    protected $fillable= ['id','name','user_id','category_id','type','description','link','file','approve','share'];

    protected $relations = ['user','category'];
    protected $searchable = ['name','description'];
    protected $with = ['user','category'];

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
        public function category ()
    {
        return $this->belongsTo('App\Category');
    }
}