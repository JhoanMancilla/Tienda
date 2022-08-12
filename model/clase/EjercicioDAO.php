<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/libs/conexion.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/Ejercicio.php");

class EjercicioDAO{

	public function agregarEjercicio($ejercicio){
			$ejercicioJson = json_decode($ejercicio);
			$ejercicio = new Ejercicio($ejercicioJson->titulo,$ejercicioJson->descripcion,$ejercicioJson->fecha_inicio,$ejercicioJson->fecha_fin,$ejercicioJson->sin_fecha,$ejercicioJson->autor,$ejercicioJson->estado);
			$sql = "INSERT INTO `ejercicio`(`titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `sin_fecha`, `autor`, `tipo_ejercicio`, `estado`) VALUES (:titulo,:descripcion,:fecha_inicio,:fecha_fin,:sin_fecha,:autor,:tipo_ejercicio,:estado)";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
	        $statement->bindParam(":titulo",$ejercicio->titulo,PDO::PARAM_STR);
	        $statement->bindParam(":descripcion",$ejercicio->descripcion,PDO::PARAM_STR);
	        $statement->bindParam(":fecha_inicio",$ejercicio->fecha_inicio,PDO::PARAM_STR);
	        $statement->bindParam(":fecha_fin",$ejercicio->fecha_fin,PDO::PARAM_STR);
	        $statement->bindParam(":sin_fecha",$ejercicio->sin_fecha,PDO::PARAM_STR);
	        $statement->bindParam(":autor",$ejercicio->autor,PDO::PARAM_STR);
	        $statement->bindParam(":tipo_ejercicio",$ejercicio->tipo_ejercicio,PDO::PARAM_STR);
	        $statement->bindParam(":estado",$ejercicio->estado,PDO::PARAM_STR);
	        $statement->execute();
	        	
	}		


	public function listarEjercicios($idProfesor){

			$sql = "SELECT * FROM `ejercicio` WHERE autor=:idProfesor";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
			$statement->bindParam(":autor",$idProfesor,PDO::PARAM_STR);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                array_push($ejercicios, new Ejercicio($row["id"],$row["titulo"],$row["descripcion"],$row["fecha_inicio"],$row["fecha_fin"],$row["sin_fecha"],$row["autor"],$row["tipo_ejercicio"],$row["estado"]));
            }
			$ejerciciosJson = json_decode($ejercicios); 

	        return $ejerciciosJson;
	}
	

	public function editarEjercicio($ejercicio){
			$ejercicioJson = json_decode($ejercicio);
			$ejercicio = new Ejercicio($ejercicioJson->titulo,$ejercicioJson->descripcion,$ejercicioJson->fecha_inicio,$ejercicioJson->fecha_fin,$ejercicioJson->sin_fecha,$ejercicioJson->autor,$ejercicioJson->estado);
			$sql = "UPDATE `ejercicio` SET `titulo`=:titulo, `descripcion`=:descripcion, `fecha_inicio`=:fecha_inicio, `fecha_fin`=:fecha_fin, `sin_fecha`=:sin_fecha, `estado`=:estado WHERE `id`=:id";
			#$sql = "UPDATE `ejercicio` SET `titulo`='Pepito Perez', `descripcion`='Juanito el rajador', `fecha_inicio`='2021-12-12', `fecha_fin`='2021-12-15', `sin_fecha`=0, `estado`=1 WHERE `id`=12";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
	        $statement->bindParam(":titulo",$ejercicio->titulo,PDO::PARAM_STR);
	        $statement->bindParam(":descripcion",$ejercicio->descripcion,PDO::PARAM_STR);
	        $statement->bindParam(":fecha_inicio",$ejercicio->fecha_inicio,PDO::PARAM_STR);
	        $statement->bindParam(":fecha_fin",$ejercicio->fecha_fin,PDO::PARAM_STR);
	        $statement->bindParam(":sin_fecha",$ejercicio->sin_fecha,PDO::PARAM_STR);
	        $statement->bindParam(":id",$ejercicio->id,PDO::PARAM_STR);
	        $statement->bindParam(":estado",$ejercicio->estado,PDO::PARAM_STR);
	        $statement->execute();        	
	}

	public function eliminarEjercicio($id_ejercicio){
			$sql = "DELETE FROM `ejercicio` WHERE `id`=:id_ejercicio";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
	        $statement->bindParam(":id_ejercicio",$id_ejercicio,PDO::PARAM_STR);
	        $statement->execute();        	
	}



}


?>