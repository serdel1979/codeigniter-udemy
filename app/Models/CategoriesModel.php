<?php

namespace App\Models;

use CodeIgniter\Model;


class CategoriesModel extends Model{

    protected $table = 'categories';
    protected $primaryKey = 'id';

   // protected $useSoftDeletes = true;

   // protected $allowedFields = ['id','name','deleted_at'];
    protected $allowedFields = ['id','name'];




    public function getCategories(){
        return $this->findAll();
        // echo "<pre>";
        // print_r($categories);
        // echo "</pre>";
        // return $categories;
    }
    


    public function add($dato){
       return $this->save($dato);
    }

    public function getCategory($id){
        return $this->find($id);
    }

    public function deletCategory($id){
        return $this->delete($id);
    }
}