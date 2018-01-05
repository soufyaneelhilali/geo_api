<?php
/**
 * Created by PhpStorm.
 * User: next
 * Date: 6/13/17
 * Time: 12:44 AM
 */

namespace App\Repositories;


use App\Device;

class DeviceRepository extends Repository
{
    public function __construct(Device $model)
    {
        parent::__construct($model);
    }
}