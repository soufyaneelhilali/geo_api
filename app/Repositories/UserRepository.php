<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 14/03/17
 * Time: 07:53 م
 */

namespace App\Repositories;


use App\User;

class UserRepository extends Repository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}