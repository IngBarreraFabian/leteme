<?php
include_once('models/horario_fichadao.php');
class Horario_fichaModel extends Model{
    function __construct(){
        parent::__construct();
}
public function CargarFichas(){
    $items = [];
    try{
        $query = $this->db->connect()->query('SELECT nroficha,programa FROM ficha');
        include_once('models/fichadao.php');
        while($row = $query->fetch()){
            $item = new FichaDAO();
            $item->nroficha=$row['nroficha'];
            $item->programa=$row['programa'];
           
          
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
public function CargarInstructor(){
    $items = [];
    try{
        $query = $this->db->connect()->query('SELECT documento, nombres FROM instructor');
        include_once('models/instructordao.php');
        while($row = $query->fetch()){
            $item = new InstructorDAO();
            $item->documento = $row['documento'];
            $item->nombres    = $row['nombres'];
           
          
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
public function CargarJornada(){
    $items = [];
    try{
        $query = $this->db->connect()->query('SELECT jornada FROM jornada');
        include_once('models/jornadadao.php');
        while($row = $query->fetch()){
            $item = new jornadaDAO();
            $item->jornada = $row['jornada'];
           
          
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
public function Leer(){
    $items = [];
    try{
        $query = $this->db->connect()->query('SELECT ficha_nroficha, instructor_documento, sesion_jornada, dia, hora_inicio, hora_fin, ambiente, fecha_inicio, fecha_fin FROM horario_ficha');
        
        while($row = $query->fetch()){
            $item = new Horario_fichaDAO();
            $item->ficha_nroficha = $row['ficha_nroficha'];
            $item->instructor_documento    = $row['instructor_documento'];
            $item->sesion_jornada  = $row['sesion_jornada'];
            $item->dia  = $row['dia'];
            $item->hora_inicio  = $row['hora_inicio'];
            $item->hora_fin  = $row['hora_fin'];
            $item->ambiente  = $row['ambiente'];
            $item->fecha_inicio  = $row['fecha_inicio'];
            $item->fecha_fin  = $row['fecha_fin'];
          
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
public function readById($ficha,$instructor,$jornada,$dia){
    $item = new Horario_fichaDAO();
    try{
        $query = $this->db->connect()->prepare('SELECT * FROM horario_ficha WHERE ficha_nroficha = :nroficha and instructor_documento=:documento and sesion_jornada=:jornada and dia=:dia');

        $query->execute([
                        'nroficha' => $ficha,
                        'documento' => $instructor,
                        'jornada' => $jornada,
                        'dia' => $dia
                        ]);
        while($row = $query->fetch()){
            $item = new Horario_fichaDAO();
            $item->ficha_nroficha = $row['ficha_nroficha'];
            $item->instructor_documento = $row['instructor_documento'];
            $item->sesion_jornada = $row['sesion_jornada'];
            $item->dia  = $row['dia'];
            $item->hora_inicio = $row['hora_inicio'];
            $item->hora_fin = $row['hora_fin'];
            $item->ambiente = $row['ambiente'];
            $item->fecha_inicio = $row['fecha_inicio'];
            $item->fecha_fin = $row['fecha_fin'];

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
    $query = $this->db->connect()->prepare('UPDATE horario_ficha SET hora_inicio= :hora_inicio, hora_fin = :hora_fin, ambiente= :ambiente, fecha_inicio= :fecha_inicio, fecha_fin= :fecha_fin WHERE ficha_nroficha = :ficha_nroficha and instructor_documento= :instructor_documento and sesion_jornada= :sesion_jornada and dia= :dia');
    try{
        $query->execute([
            'ficha_nroficha' => $item['ficha_nroficha'],
            'instructor_documento' => $item['instructor_documento'],
            'sesion_jornada' => $item['sesion_jornada'],
            'dia' => $item['dia'],
            'hora_inicio' => $item['hora_inicio'],
            'hora_fin' =>$item['hora_fin'],
            'ambiente' => $item['ambiente'],
            'fecha_inicio' => $item['fecha_inicio'],
            'fecha_fin' => $item['fecha_fin']
        ]);
        return true;
    }catch(PDOException $e){
        if(constant("DEBUG")){
            echo $e->getMessage();
        }
        return false;
    }
}
public function eliminar($ficha_nroficha, $instructor_documento, $sesion_jornada, $dia){
    $query = $this->db->connect()->prepare('DELETE FROM horario_ficha WHERE ficha_nroficha = :ficha_nroficha and instructor_documento = :instructor_documento and sesion_jornada = :sesion_jornada and dia = :dia');
    try{
        $query->execute([
           
            'ficha_nroficha' => $ficha_nroficha,
            'instructor_documento' => $instructor_documento,
            'sesion_jornada' => $sesion_jornada,
            'dia' => $dia
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
        $losdias="";
        $result[]=null;
        foreach($datos["dia"] as $dia){
            $sentenceSQL="INSERT INTO horario_ficha( ficha_nroficha,instructor_documento,sesion_jornada,dia, hora_inicio, hora_fin, ambiente, fecha_inicio, fecha_fin) VALUES( :ficha_nroficha, :instructor_documento,:sesion_jornada, :dia, :hora_inicio, :hora_fin, :ambiente, :fecha_inicio, :fecha_fin)";
            $connexionDB=$this->db->connect();
            $query = $connexionDB->prepare($sentenceSQL);
            
            try{
                $query->execute([
                                'ficha_nroficha' => $datos['ficha_nroficha'],
                                'instructor_documento' => $datos['instructor_documento'],
                                'sesion_jornada' => $datos['sesion_jornada'],
                                'dia' => rtrim(ltrim($dia)),
                                'hora_inicio' => $datos['hora_inicio'],
                                'hora_fin' => $datos['hora_fin'],
                                'ambiente' => $datos['ambiente'],
                                'fecha_inicio' => $datos['fecha_inicio'],
                                'fecha_fin' => $datos['fecha_fin']
                ]);
                $result[]=true;
            }catch(PDOException $e){
                if(constant("DEBUG")){
                        echo $e->getMessage();
                }
                
                $result[]=false;
            }
        }
        foreach($result as $r){
            if(!$r){
                return false;
            }
        }
        return true;
    }
}
?>