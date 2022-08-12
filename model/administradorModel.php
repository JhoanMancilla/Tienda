<?php 
/**
 * summary
 */
require_once("clase/Profesor.php");
require_once("clase/Persona.php");

class AdministradorModel extends Model
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function agregarProfesores($profesores){
        $profesoresJ = json_decode($profesores);
        foreach ($profesoresJ as $profesor) {
        $sql = "INSERT INTO `persona`(`nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES (:nombre,:apellido,:correo,:clave,:tipo_persona)";
        $tipo_persona='Profesor';
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$profesor[0],PDO::PARAM_STR);
        $statement->bindParam(":apellido",$profesor[1],PDO::PARAM_STR);
        $statement->bindParam(":correo",$profesor[2],PDO::PARAM_STR);
        $statement->bindParam(":clave",$profesor[3],PDO::PARAM_STR);
        $statement->bindParam(":tipo_persona",$tipo_persona,PDO::PARAM_STR);
        if($profesor[0]!=null){
            $statement->execute();
            $id_profesor=$this->conexion->lastInsertId();
            $sql2 = "INSERT INTO `profesor`(`id_profesor`, `codigo`, `institucion`) VALUES (:id_profesor,:codigo,:institucion)";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql2);
            $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
            $statement->bindParam(":codigo",$profesor[3],PDO::PARAM_STR);
            $statement->bindParam(":institucion",$profesor[4],PDO::PARAM_STR);
            $statement->execute();
            }
        } return json_encode(array("estado" => 1)); 
    }
       
   

    public function listarProfesores(){
            $sql = "SELECT pe.id,pe.nombre,pe.apellido,pe.correo,p.institucion,p.codigo FROM `persona`pe INNER JOIN profesor p on p.id_profesor=pe.id AND p.estado=1";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql);
            $items=array();
            if($statement->execute()){
                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    array_push($items, new Profesor($row['id'],$row['nombre'],$row['apellido'],$row['correo'],$row['codigo'],$row['institucion']));
                        

                }
                return json_encode(array("estado" => 1, "items"=>$items));
            }else{
                return json_encode(array("estado" => 0));
            }         
        }


    public function eliminarProfesor($id_profesor){
        $sql = "UPDATE `profesor` SET `estado`=0 WHERE `id_profesor`=:id_profesor";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
        if($statement->execute()){
            return json_encode(array("estado" => 1));
        }else{
            return json_encode(array("estado" => 0));
        }
    }

    public function listarProfesor($profesor){
            $id_profesor=$profesor;
            $sql = "SELECT pe.id,pe.nombre,pe.apellido,pe.correo,p.institucion,p.codigo FROM `persona`pe INNER JOIN profesor p on p.id_profesor=pe.id AND p.estado=1 AND p.id_profesor=:id_profesor";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
            if($statement->execute()){
                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                    $profe = new Profesor($row['id'],$row['nombre'],$row['apellido'],$row['correo'],$row['codigo'],$row['institucion']);             
                }
                return json_encode(array("estado" => 1, "items"=>$profe));
            }else{
                return json_encode(array("estado" => 0));
            }         
        }

    public function actualizarProfesor($profesor){
        $profesorJ=json_decode($profesor);
        $sql = "UPDATE `persona` SET `nombre`=:nombre,`apellido`=:apellido,`correo`=:correo WHERE `id`=:idProfesor";
        $tipo_persona='Profesor';
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$profesorJ[2],PDO::PARAM_STR);
        $statement->bindParam(":apellido",$profesorJ[3],PDO::PARAM_STR);
        $statement->bindParam(":correo",$profesorJ[4],PDO::PARAM_STR);
        $statement->bindParam(":idProfesor",$profesorJ[0],PDO::PARAM_STR);
        if($statement->execute()){
            $sql2 = "UPDATE `profesor` SET `codigo`=:codigo,`institucion`=:institucion WHERE `id_profesor`=:idProfesor";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql2);
            $statement->bindParam(":idProfesor",$profesorJ[0],PDO::PARAM_STR);
            $statement->bindParam(":codigo",$profesorJ[1],PDO::PARAM_STR);
            $statement->bindParam(":institucion",$profesorJ[5],PDO::PARAM_STR);
            $statement->execute();
         return json_encode(array("estado" => 1)); 
        } 
    }

    public function agregarProfesor($profesor){
        $profesorJ=json_decode($profesor);
        $sql = "INSERT INTO `persona`(`nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES (:nombre,:apellido,:correo,:clave,:tipo_persona)";
        $tipo_persona='Profesor';
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$profesorJ[1],PDO::PARAM_STR);
        $statement->bindParam(":apellido",$profesorJ[2],PDO::PARAM_STR);
        $statement->bindParam(":correo",$profesorJ[3],PDO::PARAM_STR);
        $statement->bindParam(":clave",$profesorJ[0],PDO::PARAM_STR);
        $statement->bindParam(":tipo_persona",$tipo_persona,PDO::PARAM_STR);
        if($statement->execute()){
            $id_profesor=$this->conexion->lastInsertId();
            $sql2 = "INSERT INTO `profesor`(`id_profesor`, `codigo`, `institucion`) VALUES (:id_profesor,:codigo,:institucion)";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql2);
            $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
            $statement->bindParam(":codigo",$profesorJ[0],PDO::PARAM_STR);
            $statement->bindParam(":institucion",$profesorJ[4],PDO::PARAM_STR);
            $statement->execute();
            return json_encode(array("estado" => 1)); 
        }
        
    }






}
 ?>