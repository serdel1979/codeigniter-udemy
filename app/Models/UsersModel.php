<?php

namespace App\Models;

use CodeIgniter\Model;


class UsersModel extends Model{

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','name','username','password','rol','last','deleted_at'];



    public function getUsers(){
        return $this->findAll();
    }


    public function add($dato){
       return $this->save($dato);
    }

    public function getUser($id){
        return $this->find($id);
    }

    public function deletUser($id){
        return $this->delete($id);
    }


}