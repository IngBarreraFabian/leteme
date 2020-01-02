<?php

class IndexModel extends Model{
    function __construct(){
        parent::__construct();
    }
    function consultarUsuario($email,$password){
        $result="";
        try{
            $query = $this->db->connect()->prepare('SELECT username,create_time FROM usuario WHERE email = :email and password=:clave');

            $query->execute(['email' => $email,
                             'clave'=>  $password
                            ]);
            
            if($row = $query->fetch()){
                $result=$row['username'];
            }
            return $result;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return null;
        }
    }
}