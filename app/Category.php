<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
        use ModelUtility;
    	protected $fillable= ['id','name'];
}
