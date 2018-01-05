<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 25/03/17
 * Time: 01:41 م
 */

namespace App\Repositories;


use App\Map;

class MapRepository extends  Repository
{
    public function __construct(Map $model)
    {
        parent::__construct($model);
    }
}