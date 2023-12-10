<?php

namespace App\Models;

use CodeIgniter\Model;


class PostsModel extends Model{

    protected $table = 'posts';
    protected $primaryKey = 'id';

  //  protected $useSoftDeletes = true;

    protected $allowedFields = ['id','banner','created_at','content','created_by','category','intro','tags','slug'];

    public function uploadPost(){
        $this->loadViews("uploadPost");
    }


    public function getPosts(){
        return $this->findAll();
    }


    public function addPost($dato){
       return $this->save($dato);
    }

    public function getPost($id){
        return $this->find($id);
    }

    public function deletPost($id){
        return $this->delete($id);
    }


}