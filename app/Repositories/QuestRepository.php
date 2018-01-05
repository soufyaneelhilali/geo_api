<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 07/07/17
 * Time: 07:27 م
 */

namespace App\Repositories;


use App\Quest;

class QuestRepository extends Repository
{
    public function __construct(Quest $model)
    {
        parent::__construct($model);
    }
}