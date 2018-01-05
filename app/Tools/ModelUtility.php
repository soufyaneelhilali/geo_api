<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 21/03/17
 * Time: 10:45 م
 */

namespace App\Tools;


trait ModelUtility
{
    public function hasAttributes(Array $fields){
        $fillable = $this->getFillable();
        $fillable[] = $this->primaryKey;
        $diff = array_diff($fields,$fillable);
        if(count($diff)>0)
            return false;

        return true;
    }
    public function getFillable () {
        return $this->fillable;
    }

    public function hasRelations (Array $requested){
        $models = $this->getRelations();
        $diff = array_diff($requested,$models);
        if(count($diff)>0)
            return false;
        return true;
    }

    private function isShown ($val) {
        return in_array($val,$this->appends);
    }
    private function getHiddenArray($array) {
        $hidden = [];
        foreach ($array as $item) {
            if(!$this->isShown($item)) {
                $hidden [] = $item;
            }
        }
        return  $hidden;
    }
    private function deleteTheSameConumnName(Array $maps,Array $appends){
        foreach ($maps as $key => $val){
            if($key == $val){
                unset($appends[array_search($key,$appends)]);
            }
        }
        return $appends;
    }
    private function excludeTheSameName(Array $array){
        foreach ($array as $k => $v){
            if($k == $v)
                unset($array[$k]);
        }
        return $array;
    }
    public function getVisibleColumns(Array $fields){
        $alias = array_keys($this->maps);
        return array_diff($alias,$fields);
    }
    private function buildWhere ($fields,$s)
    {
        $where = [];
        foreach ($fields as $field)
        {

            $where[] = [$field, 'like' ,'%'.$s.'%','OR'];
        }
        return $where;

    }
    public function scopeSearch ($query,$s)
    {
        $where = $this->buildWhere($this->searchable,$s);
        return $query->where($where);
    }


}