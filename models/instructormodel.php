<?php
include_once('models/instructordao.php');
class InstructorModel extends Model{
    function __construct(){
        parent::__construct();
}
public function Leer(){
    $items = [];
    try{
        $query = $this->db->connect()->query('SELECT documento, nombres, apellidos, email, celular, whatsapp FROM instructor');
        
        while($row = $query->fetch()){
            $item = new instructorDAO();
            $item->documento = $row['documento'];
            $item->nombres    = $row['nombres'];
            $item->apellidos  = $row['apellidos'];
            $item->email  = $row['email'];
            $item->celular  = $row['celular'];
            $item->whatsapp  = $row['whatsapp'];
          
            array_push($items, $item);
        }
        return $items;
    }catch(PDOException $e){
       if(constant("DEBUG")){
           echo $e->getMessage();
       }
        return [];
    }
}
public function readById($documento){
    $item = new instructorDAO();
    try{
        $query = $this->db->connect()->prepare('SELECT * FROM instructor WHERE documento = :documento');

        $query->execute(['documento' => $documento]);
        
        while($row = $query->fetch()){
            $item->documento = $row['documento'];
            $item->nombres    = $row['nombres'];
            $item->apellidos  = $row['apellidos'];
            $item->email  = $row['email'];
            $item->celular  = $row['celular'];
            $item->whatsapp  = $row['whatsapp'];
        }
        return $item;
    }catch(PDOException $e){
        if(constant("DEBUG")){
            echo $e->getMessage();
        }
        return null;
    }
}
public function update($item){
    $query = $this->db->connect()->prepare('UPDATE instructor SET nombres = :nombres, apellidos = :apellidos, email = :email, celular = :celular, whatsapp = :whatsapp WHERE documento = :documento');
    try{
        $query->execute([
            'documento' => $item['documento'],
            'nombres' => $item['nombres'],
            'apellidos' => $item['apellidos'],
            'email' => $item['email'],
            'celular' => $item['celular'],
            'whatsapp' => $item['whatsapp']
        ]);
        return true;
    }catch(PDOException $e){
        if(constant("DEBUG")){
            echo $e->getMessage();
        }
        return false;
    }
}
public function Eliminar($id){
    $query = $this->db->connect()->prepare('DELETE FROM instructor WHERE documento = :identificador');
    try{
        $query->execute([
            'identificador' => $id
        ]);
        return true;
    }catch(PDOException $e){
        if(constant("DEBUG")){
            echo $e->getMessage();
        }
        return false;
        }
    }
    public function Guardar($datos){
        $sentenceSQL="INSERT INTO instructor( documento, nombres, apellidos, email, celular, whatsapp) VALUES( :documento, :nombres, :apellidos, :email, :celular, :whatsapp)";
            $connexionDB=$this->db->connect();
            $query = $connexionDB->prepare($sentenceSQL);
            
            try{
                $query->execute([
                                'documento' => $datos['documento'],
                                'nombres' => $datos['nombres'],
                                'apellidos' => $datos['apellidos'],
                                'email' => $datos['email'],
                                'celular' => $datos['celular'],
                                'whatsapp' => $datos['whatsapp']
                ]);
                return true;
            }catch(PDOException $e){
            if(constant("DEBUG")){
                    echo $e->getMessage();
            }
                
                return false;
            }
    }
}
?>