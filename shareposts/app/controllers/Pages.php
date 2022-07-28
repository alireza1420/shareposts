<?php

  class Pages extends Controller  {
    public function __construct(){
      $this->postModel = $this->model('Post');
    }
    
    public function index(){
      if(CheckUserLogin()){
        Redirect('posts');
      }


      $posts = $this->postModel->GetPosts();
      
      $data = [
        'title' => SITENAME,
        'posts' => $posts
        ,'desc' => 'App to share posts on Network made by Alireza_MVC Framework based on PHP'
        ,'postname' =>'Home'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
        ,'desc' => 'App to share posts on Network made by Alireza_MVC Framework based on PHP'
      ];

      $this->view('pages/about', $data);
    }
  }