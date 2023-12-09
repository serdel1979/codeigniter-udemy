<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Dashboard extends BaseController
{
    // public function index(): string
    // {
    //     $data['current_url'] = current_url();

    //     $model = new UsersModel();

    //     //    protected $allowedFields = ['id','name','username','password','rol','last','deleted'];
    //     // $id = $model->insert([
    //     //     'name'=>'Loreno',
    //     //     'username'=>'lola',
    //     //     'password'=>'lolalola',
    //     //     'rol'=>'1',
    //     //     'last'=>'9-12-2023'
    //     // ]);

    //     return view('dashboard', $data);
    // }


    public function index(){

        $this->loadView("index");

    }

    public function loadView($view=null){
        echo view('includes/header');
        echo view($view);
        echo view('includes/footer');
    }

}