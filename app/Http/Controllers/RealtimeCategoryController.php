<?php
/**
 * Created by PhpStorm.
 * User: next
 * Date: 6/13/17
 * Time: 12:54 AM
 */

namespace App\Http\Controllers;


use App\Repositories\RealtimeCategoryRepository;
use Illuminate\Http\Request;

class RealtimeCategoryController extends ResourceController
{
    public function __construct(RealtimeCategoryRepository $repository, Request $request)
    {

        parent::__construct($repository, $request);
    }
}