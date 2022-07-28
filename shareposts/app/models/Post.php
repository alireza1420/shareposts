<?php 

    class Post extends Database{
        private $Db;

        public function __construct()
        {
            $this->Db=new Database;
        }

        public function GetPosts(){
            $this->Db->Query('SELECT *,
            posts.id as postId,
            users.id as userId,
            posts.created_at as postCreated,
            users.created_at as userCreated
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.id
            ORDER BY posts.created_at DESC
            ');
            $Results = $this->Db->ResultSet();

            return  $Results;
        }

        public function AddPost($data){
            $this->Db->Query('INSERT INTO posts(title,user_id,body)VALUES(:title,:user_id,:body)');
            //Bind values
            $this->Db->Bind(':title',$data['title']);
            $this->Db->Bind(':user_id',$data['user_id']);
            $this->Db->Bind(':body',$data['body']);

            //Execute
            if($this->Db->Execute()){
                return true;
            }else{

                return false;
            }

        }
        public function updatePost($data){
            $this->Db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
            // Bind values
            $this->Db->bind(':id', $data['id']);
            $this->Db->bind(':title', $data['title']);
            $this->Db->bind(':body', $data['body']);
      
            // Execute
            if($this->Db->execute()){
              return true;
            } else {
              return false;
            }
          }

        public function getPostById($id){
            $this->Db->query('SELECT * FROM posts WHERE id = :id');
            $this->Db->Bind(':id', $id);
      
            $row = $this->Db->single();
      
            return $row;
          }
          public function deletePost($id){
            $this->Db->query('DELETE FROM posts WHERE id = :id');
            $this->Db->Bind(':id', $id);
      
            if($this->Db->Execute()){
                return true;
              } else {
                return false;
              }
    
        }

    }

?>