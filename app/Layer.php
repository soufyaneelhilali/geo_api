<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Layer extends Model
{
    use ModelUtility;
    protected $fillable= ['id','name','user_id','category_id','type','featuretype','table_name','workspace','store','description','img_src','attributs','bbox','srs','style','metadata','file','approve','share'];

    protected $casts = ['attributs'=>'json'];

    protected $relations = ['user','maps','category'];
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
    public function maps ()
    {
        return $this->belongsToMany('App\Maps');
    }
}