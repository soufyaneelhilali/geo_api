<?php

namespace App;

use App\Tools\ModelUtility;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use ModelUtility;
    protected $fillable= ['id','name',"created_at","updated_at"];
    protected $searchable = ['name'];


}
