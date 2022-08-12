<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/libs/conexion.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/libs/Profesor.php");


class ProfesorDAO{


	public function agregarProfesor($profesor){
		$profesorJson = json_decode($profesor);
		$profesor = new Profesor($profesorJson->nombre,$profesorJson->apellido,$profesorJson->correo,$profesorJson->clave,$profesorJson->tipo_persona,$profesorJson->codigo,$profesorJson->institucion);
		$sql = "INSERT INTO `persona`(`nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES (:nombre,:apellido,:correo,:clave,:tipo_persona)";
		$this->conexion=conexion::getConexion();
		$statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$profesor->nombre,PDO::PARAM_STR);
        $statement->bindParam(":apellido",$profesor->apellido,PDO::PARAM_STR);
        $statement->bindParam(":correo",$profesor->correo,PDO::PARAM_STR);
        $statement->bindParam(":clave",$profesor->clave,PDO::PARAM_STR);
        $statement->bindParam(":tipo_persona",$profesor->tipo_persona,PDO::PARAM_STR);
        if($statement->execute()){
        	$id_profesor=$this->conexion->lastInsertId();
        	$sql2 = "INSERT INTO `profesor`(`id_profesor`, `codigo`, `institucion`) VALUES (:id_profesor,:codigo,:institucion)";
        	$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql2);
	        $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
	        $statement->bindParam(":codigo",$profesor->codigo,PDO::PARAM_STR);
	        $statement->bindParam(":institucion",$profesor->institucion,PDO::PARAM_STR);
	        $statement->execute();

        }
	}	


	public function listarProfesores(){
			$sql = "SELECT * FROM `profesor`";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
			if($statement->execute()){
				while($row = $statement->fetch(PDO::FETCH_ASSOC)){
					$sql2="SELECT * FROM `persona` WHERE `id`=:id_profesor";
					$statement=$this->conexion->prepare($sql2);
					$statement->bindParam(":id_profesor",$row['id_profesor'],PDO::PARAM_STR);
					if($statement->execute()){
						while($row = $statement->fetch(PDO::FETCH_ASSOC)){
							array_push($profesores, new Profesor($row['id'],$row['nombre'],$row['apellido'],$row['correo'],$row['clave'],$row['tipo_persona']));
						}
					}
					$sql3="SELECT * FROM `profesor` WHERE `id_profesor`=:id_profesor";
					$statement=$this->conexion->prepare($sql3);
					$statement->bindParam(":id_profesor",$row['id_profesor'],PDO::PARAM_STR);
					if($statement->execute()){
						while($row = $statement->fetch(PDO::FETCH_ASSOC)){
							array_push($profesores, $row['codigo'],$row['institucion']);
						}
					}

            	}
            }
			$profesoresJson = json_decode($profesores); 

	        return $profesoresJson;
	    }


	public function editarProfesores($profesor){
		$profesorJson = json_decode($profesor);
		$profesor = new Profesor($profesorJson->nombre,$profesorJson->apellido,$profesorJson->correo,$profesorJson->clave,$profesorJson->tipo_persona,$profesorJson->codigo,$profesorJson->institucion);
		$sql = "UPDATE `persona` SET `nombre`=:nombre, `apellido`=:apellido, `correo`=:correo, `clave`=:clave WHERE `id`=:id_profesor";
		$this->conexion=conexion::getConexion();
		$statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$profesor->nombre,PDO::PARAM_STR);
        $statement->bindParam(":apellido",$profesor->apellido,PDO::PARAM_STR);
        $statement->bindParam(":correo",$profesor->correo,PDO::PARAM_STR);
        $statement->bindParam(":clave",$profesor->clave,PDO::PARAM_STR);
        $statement->bindParam(":id_profesor",$profesor->id_profesor,PDO::PARAM_STR);
        if($statement->execute()){
        	$sql2 = "UPDATE `profesor` SET `codigo`=:codigo, `institucion`=:institucion WHERE `id_profesor`:id_profesor";
        	$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql2);
	        $statement->bindParam(":id_profesor",$profesor->id_profesor,PDO::PARAM_STR);
	        $statement->bindParam(":codigo",$profesor->codigo,PDO::PARAM_STR);
	        $statement->bindParam(":institucion",$profesor->institucion,PDO::PARAM_STR);
	        $statement->execute();

        }

	}


	public function eliminarProfesores($id_profesor){
		$sql = "DELETE FROM `profesor` WHERE `id_profesor`=:id_profesor";
		$this->conexion=conexion::getConexion();
		$statement=$this->conexion->prepare($sql);
        $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
        if($statement->execute()){
        	$sql2 = "DELETE FROM `persona` WHERE `id`=:id_profesor";
        	$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql2);
	        $statement->bindParam(":id_profesor",$id_profesor,PDO::PARAM_STR);
	        $statement->execute();

        }
	}



}




?>