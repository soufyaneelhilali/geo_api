<?php

namespace App;


use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Map extends Model
{
    use ModelUtility;

    protected $fillable = ['id','name','description','attributs','img_src','layers','created_at','updated_at','user_id','theme_id','approve','share'];
    protected $relations = ['user','theme','layers'];
    protected $searchable = ['name','description'];
    protected $with = ['user','theme','layers'];
    protected $casts = ['attributs'=>'json'];

/*    public function GetAttributsAttribute ($value)
    {
        return json_decode($value,true);
    }*/

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function theme ()
    {
        return $this->belongsTo('App\Theme');
    }
    public function layers ()
    {
        return $this->belongsToMany('App\Layer');
    }
}
