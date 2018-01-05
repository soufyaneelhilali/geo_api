<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use ModelUtility;
    protected $fillable = ['id','title','agents','attributs','created_at','updated_at'];
    protected $casts = [
        'agents' => 'array',
        'attributs'=>'array'
    ];

}
