<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 14/03/17
 * Time: 07:52 م
 */

namespace App\Repositories;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Repository
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(Request $request,$fields = null){

        $relationships = $this->getRellationShip($request);
        $model = $this->model->find($request->id);
        if($model){
            if($fields){
                if($this->model->hasAttributes($fields)){
                    $model->setVisible($fields);
                }
                else
                    return false;// TODO SEND EMAIL
            }
            if(count($relationships)> 0){
                if($this->model->hasRelations($relationships))
                    return $model->load($relationships);

            }
            return $model;
        }
        return null;
    }

    public function store (Request $request,$user = false)
    {

        $inputs = $request->all();
        if($user)
        {
            $inputs['user_id'] = $request->user()->id;
        }
        $model = new $this->model($inputs);
        if($model->save()) {
            return $model;
        }
        return null;
    }

    public function index(Request $request){


        $fields = $this->getFields($request);
        $rellations = $this->getRellationShip($request);
        if($this->model->hasAttributes([$request->orderby])) {
            $orderBy = $request->orderby ? $request->orderby : 'updated_at';
            $order = $request->order ? $request->order : 'ASC';
        }
        else{
            $orderBy = "updated_at";
            $order='DESC';
        }

        if($request->count){
            if($request->q)
            {
                return $this->model->search($request->q)->count();
            }
            if($request->where)
            {
                $models =  $this->model;
                $where = explode(',',$request->where);
                if($this->model->hasAttributes([$where[0]]))
                {
                    return $models = $models->where($where[0],$where[1])->count();

                }

            }
            return $this->model->all()->count();
        }

        if ($request->paginate)
        {
            $models = null;
            if(count($rellations)>0){
                if($this->model->hasRelations($rellations)){
                    $models =  $this->model->with($rellations)->orderBy($orderBy,$order)->paginate($request->paginate);
                }
                else
                    return false;
            }
            if($request->q)
            {
                $models =  $this->model;
                if($request->where)
                {
                    $where = explode(',',$request->where);
                    if($this->model->hasAttributes([$where[0]]))
                    {
                        $models = $models->where($where[0],$where[1]);


                    }

                }
                $models =  $models->search($request->q)->orderBy($orderBy,$order)->paginate($request->paginate);
            }else{
                $models =  $this->model;
                if($request->where)
                {
                    $where = explode(',',$request->where);
                    if($this->model->hasAttributes([$where[0]]))
                    {
                        $models = $models->where($where[0],$where[1]);


                    }

                }

                $models =  $models->orderBy($orderBy,$order)->paginate($request->paginate);
            }
            return $models;
        }
        // init model
        $models = null;

        // check fields , and load data
        if($fields){
            if($this->model->hasAttributes($fields)){
                $fields [] = $this->model->getKeyName();
                $models =  $this->model->orderBy($orderBy,$order)->select($fields)->get();
                foreach ($models as $model){
                    $model->setVisible($fields);
                }
            }
            else
                return false;
        }
        else{
            if($request->q)
            {
                $models = $this->model->search($request->q);
                if($request->where)
                {
                    $where = explode(',',$request->where);

                    if($this->model->hasAttributes([$where[0]]))
                    {
                        $models->where([$where[0]=>$where[1]]);
                    }
                }
                $models =  $models->orderBy($orderBy,$order)->get();
            }else{

                $models = $this->model->orderBy($orderBy,$order);
                if($request->where)
                {
                    $where = explode(',',$request->where);
                    if($this->model->hasAttributes([$where[0]]))
                    {

                        $models = $models->where($where[0],$where[1])->get();


                    }

                }else{
                    $models = $models->get();
                }




            }
        }

        // check if need to load relations
        if(count($rellations)>0){
            if($this->model->hasRelations($rellations))
                $models->load($rellations);
            else
                return false;
        }
        // finish
        return $models;
    }
    public function destroy(Request $request){
        $model = $this->model->find($request->id);
        if($model){
/*            if(!$this->haveAccess($request->user(),$model))
                return false;*/
            $model->delete();
            return true;
        }
        return null;
    }
    protected function getFields(Request $request){
        if($request->fields)
            return explode(',',$request->fields);
        return null;
    }
    private function getRellationShip($request)
    {
        if($request->with)
            return explode(',',$request->with);

        return null;
    }
    protected function haveAccess(User $userCnt,$model){
        if($userCnt->type != "SUPER_ADMIN" && $userCnt->type != "ADMIN" && $model->user_id != $userCnt->id)
            return false;
        return true;
    }
    public function update(Request $request){
        $inputs = $request->all();
        $model = $this->model->find($request->id);
        if($model){
            $model->fill($inputs);
            if($model->save()){
                return $model;
            }
        }
        return null;
    }
}