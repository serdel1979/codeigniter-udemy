<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PostsModel;
use App\Models\CategoriesModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->loadView("index");
    }


    public function uploadpost(){
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
            if(!$validation->withRequest($this->request)->run()){
                $errors = $validation->getErrors();
                $data['error']=true;
            }else{
                $file= $this->request->getFile("banner");
                $filename = $file->getRandomName();
                if($file->isValid()){
                    $file->move(WRITEPATH."uploads",$filename);
                }else{
                    echo "no válido";
                }
                $post = [
                    'banner' => $filename,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => '1',
                    'intro' => $_POST['intro'],
                    'content' => $_POST['content'],
                    'category' => $_POST['category'],
                    'tags' => $_POST['tags'],
                    'slug' => url_title($_POST['slug'])
                ];
                $postModel = new PostsModel();
                $postModel->addPost($post);
                return redirect()->to(base_url('/'));
            }


        }

        $this->loadView("uploadPost",$data);
    }

    public function loadView($view=null, $data=null){       
        if($data){
            echo view('includes/header');
            echo view($view,$data);
            echo view('includes/footer');
        }else{
            echo view('includes/header');
            echo view($view);
            echo view('includes/footer');
        }
    }

}