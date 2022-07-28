<?php 

class User extends Database{

        private $db;

    public function __construct(){
        $this->db= new Database;
    }

        public function Register($data){
            $this->db->Query('INSERT INTO users(name,email,password) VALUES(:name,:email,:password)');
            //Bind value
            $this->db->Bind(':name',$data['name']);
            $this->db->Bind(':email',$data['email']);
            $this->db->Bind(':password',$data['password']);

            if($this->db->Execute()){
                return true;
            }else{
                return false;
            }
        }

//Login user

        public function Login($email,$password){
            $this->db->Query('SELECT * FROM users WHERE email=:email ');
            $this->db->Bind(':email',$email);

            $Row=$this->db->Single();

            $Hashed_Password=$Row->password;

            if(password_verify($password,$Hashed_Password)){
                
                return $Row;

        }else{
            return false;
        }
    }




    public function FindUserByEmail($email){
        $this->db->Query("SELECT * FROM users WHERE email = :email");
        //Bind value
        $this->db->Bind(':email',$email);
        $row=$this->db->Single();

        if($this->db->Rowcount()>0){
            return true;
        }else{
            return false;
        }


    }
//Get user By ID
    public function getUerById($id){
        $this->db->Query('SELECT * FROM users WHERE id = :id ');
        //BIND VALUE
        $this->db->Bind(':id',$id);
        $row=$this->db->Single();
        return $row;

    }

   

};


?>