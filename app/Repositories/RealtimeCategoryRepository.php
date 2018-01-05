<?php
/**
 * Created by PhpStorm.
 * User: next
 * Date: 6/13/17
 * Time: 12:57 AM
 */

namespace App\Repositories;


use App\RealtimeCategory;

class RealtimeCategoryRepository extends Repository
{
    public function __construct(RealtimeCategory $model)
    {
        parent::__construct($model);
    }
}