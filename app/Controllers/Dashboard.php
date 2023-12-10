<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PostsModel;
use App\Models\CategoriesModel;

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
      //  $this->loadView("index");

        $categoriesModel = new CategoriesModel();

        $data['categories'] = $categoriesModel->getCategories();

        helper(["url","form"]);
        $validation = \Config\Services::validation();
        $validation->setRules([
            "intro"=>"required",
            "content"=>"required|min_length[50]",
            "tags"=>"required",
            "slug"=>"required"
        ],[
            "intro"=>[
                "required"=>"Ingresa una intro"
            ],
            "content"=>[
                "required"=>"Debe ingresar un contenido",
                "min_length"=>"Minimo 50 caracteres"
            ],
            "tags"=>[
                "required"=>"Defina tags"
            ],
            "slug"=>[
                "required"=>"Ingrese un slug"
            ]
        ]);
        if($_POST){
            $file= $this->request->getFile("banner");
            $filename = $file->getRandomName();
            if(!$validation->withRequest($this->request)->run()){
                $errors = $validation->getErrors();
                print_r($errors);
            }else{
                echo "SENT!!!";
                $post = [
                    'banner' => $filename,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => '1',
                    'intro' => $_POST['intro'],
                    'content' => $_POST['content'],
                    'category' => $_POST['category'],
                    'tags' => $_POST['tags'],
                    'slug' => $_POST['slug'],
                ];
                $postModel = new PostsModel();
                $postModel->addPost($post);
            }

            if($file->isValid()){
                $file->move(WRITEPATH."uploads",$filename);
            }else{
                echo "no válido";
            }

        }

        echo view("uploadPost",$data);
    }

    public function loadView($view=null){
        echo view('includes/header');
        echo view($view);
        echo view('includes/footer');
    }

}