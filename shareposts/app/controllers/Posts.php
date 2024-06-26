<?php

class Posts extends Controller{


        public function __construct()
        {
            if(!CheckUserLogin()){
                Redirect('users/login');
            }

            $this->postmodel =$this->model('Post');
            $this->usermodel=$this->model('User');
        }

        public function index(){
            //Get posts
          $posts =  $this->postmodel->GetPosts();

            $data=[
                'posts' => $posts,

            ];

         $this->view('posts/index',$data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
              ];
      
              // Validate data
              if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
              }
              if(empty($data['body'])){
                $data['body_err'] = 'Please enter body text';
              }
      
              // Make sure no errors
              if(empty($data['title_err']) && empty($data['body_err'])){
                // Validated
                if($this->postmodel->AddPost($data)){
                  flash('post_message', 'Post Added');
                  Redirect('posts');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('posts/add', $data);
              }
      
            } else {
              $data = [
                'title' => '',
                'body' => ''
              ];
        
              $this->view('posts/add', $data);
            }
          }

          public function show($id){
            $post = $this->postmodel->getPostById($id);
            $user = $this->usermodel->getUerById($post->user_id);
          
      
            $data = [
              'post' => $post,
              'user' => $user,
              
            ];
      
            $this->view('posts/show', $data);
          }

         //Edit posts
         public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
              ];
      
              // Validate data
              if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
              }
              if(empty($data['body'])){
                $data['body_err'] = 'Please enter body text';
              }
      
              // Make sure no errors
              if(empty($data['title_err']) && empty($data['body_err'])){
                // Validated
                if($this->postmodel->updatePost($data)){
                  flash('post_message', 'Post Updated');
                  redirect('posts');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('posts/edit', $data);
              }
      
            } else {
              // Get existing post from model
              $post = $this->postmodel->getPostById($id);
      
              // Check for owner
              if($post->user_id != $_SESSION['user_id']){
                redirect('posts');
              }
      
              $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
              ];
        
              $this->view('posts/edit', $data);
            }
          }

          public function delete($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $post = $this->postmodel->getPostById($id);
      
                // Check for owner
                if($post->user_id != $_SESSION['user_id']){
                  redirect('posts');
                }
                
                if($this->postmodel->deletePost($id)){
                    Flash('post_message','Post Removed');
                    Redirect('posts');
                }else{
                    die('something went wrong');
                }
            }else{
                Redirect('posts');
            }

          }
           
       
    }


        
       



?>