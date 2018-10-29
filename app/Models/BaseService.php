<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2018/5/15
 * Time: 下午3:03
 */
namespace App\Models;

class BaseService{
    public $model;

    public function __construct()
    {
        $this->model = False;
    }

    public function  findAll(){
        return $this->model->OrderBy('id','desc')->get();
    }

    /**
     * 根据条件查询
     * 返回一个集合
     * @param array $attributes
     * @return mixed
     */
    public function findAllByAttributes($attributes=[]){
        return $this->model->where($attributes)->get();
    }

    /**
     * 根据主键查询 返回一条数据集合
     * @param $id
     * @return mixed
     */
    public function findByPk($id){
        return $this->model->find($id);
    }

    /**
     * 根据条件查询返回一条数据
     * @param array $attributes
     * @return mixed
     */
    public function findByAttries($attributes=[]){
        return $this->model->where($attributes)->first();
    }

    public function count(){
        return $this->model->count();
    }

    public function countByAttries($attributes=[]){
        return $this->model()->where($attributes)->count();
    }

    public function findAllWithPage($page=15){
        return $this->model->OrderBy('id','desc')->simplePaginate($page);
    }

}