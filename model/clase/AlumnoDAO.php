<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/libs/conexion.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/Alumno.php");


class AlumnoDAO{


	public function agregarAlumno($alumno){
		$AlumnoJson = json_decode($alumno);
		$Alumno = new Alumno($alumnoJson->nombre,$alumnoJson->apellido,$alumnoJson->correo,$alumnoJson->clave,$alumnoJson->tipo_persona,$alumnoJson->codigo,$alumnoJson->institucion);
		#$alumno = new Alumno("Juan2","Perez2","juanito2@gmail.com","contrasena2","Alumno","1151615","UFPS2");
		$sql = "INSERT INTO `persona`(`nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES (:nombre,:apellido,:correo,:clave,:tipo_persona)";
		$this->conexion=conexion::getConexion();
		$statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$alumno->nombre,PDO::PARAM_STR);
        $statement->bindParam(":apellido",$alumno->apellido,PDO::PARAM_STR);
        $statement->bindParam(":correo",$alumno->correo,PDO::PARAM_STR);
        $statement->bindParam(":clave",$alumno->clave,PDO::PARAM_STR);
        $statement->bindParam(":tipo_persona",$alumno->tipo_persona,PDO::PARAM_STR);
        if($statement->execute()){
        	$id_alumno=$this->conexion->lastInsertId();
        	$sql2 = "INSERT INTO `alumno`(`id_alumno`, `codigo`, `institucion`) VALUES (:id_alumno,:codigo,:institucion)";
        	$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql2);
	        $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
	        $statement->bindParam(":codigo",$alumno->codigo,PDO::PARAM_STR);
	        $statement->bindParam(":institucion",$alumno->institucion,PDO::PARAM_STR);
	        $statement->execute();

       }

	}

	public function listarAlumnos($id_curso){
			$sql = "SELECT * FROM `alumno_curso` WHERE `id_curso`=:id_curso";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
			$statement->bindParam(":id_curso",$id_curso,PDO::PARAM_STR);
			if($statement->execute()){
				while($row = $statement->fetch(PDO::FETCH_ASSOC)){
					$sql2="SELECT * FROM `persona` WHERE `id`=:id_alumno";
					$statement=$this->conexion->prepare($sql2);
					$statement->bindParam(":id_alumno",$row['id_alumno'],PDO::PARAM_STR);
					if($statement->execute()){
						while($row = $statement->fetch(PDO::FETCH_ASSOC)){
							array_push($alumnos, new Alumno($row['id'],$row['nombre'],$row['apellido'],$row['correo'],$row['clave'],$row['tipo_persona']));
						}
					}
					$sql3="SELECT * FROM `alumno` WHERE `id_alumno`=:id_alumno";
					$statement=$this->conexion->prepare($sql3);
					$statement->bindParam(":id_alumno",$row['id_alumno'],PDO::PARAM_STR);
					if($statement->execute()){
						while($row = $statement->fetch(PDO::FETCH_ASSOC)){
							array_push($alumnos, $row['codigo'],$row['institucion']);
						}
					}

            	}
            }
			$alumnosJson = json_decode($alumnos); 

	        return $alumnosJson;
	    }

	    public function editaralumnos($alumno){
			$alumnoJson = json_decode($alumno);
			$alumno = new alumno($alumnoJson->nombre,$alumnoJson->apellido,$alumnoJson->correo,$alumnoJson->clave,$alumnoJson->tipo_persona,$alumnoJson->codigo,$alumnoJson->institucion);
			$sql = "UPDATE `persona` SET `nombre`=:nombre, `apellido`=:apellido, `correo`=:correo, `clave`=:clave WHERE `id`=:id_alumno";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
	        $statement->bindParam(":nombre",$alumno->nombre,PDO::PARAM_STR);
	        $statement->bindParam(":apellido",$alumno->apellido,PDO::PARAM_STR);
	        $statement->bindParam(":correo",$alumno->correo,PDO::PARAM_STR);
	        $statement->bindParam(":clave",$alumno->clave,PDO::PARAM_STR);
	        $statement->bindParam(":id_alumno",$alumno->id_alumno,PDO::PARAM_STR);
	        if($statement->execute()){
	        	$sql2 = "UPDATE `alumno` SET `codigo`=:codigo, `institucion`=:institucion WHERE `id_alumno`:id_alumno";
	        	$this->conexion=conexion::getConexion();
				$statement=$this->conexion->prepare($sql2);
		        $statement->bindParam(":id_alumno",$alumno->id_alumno,PDO::PARAM_STR);
		        $statement->bindParam(":codigo",$alumno->codigo,PDO::PARAM_STR);
		        $statement->bindParam(":institucion",$alumno->institucion,PDO::PARAM_STR);
		        $statement->execute();

	        }
		}

		public function eliminaralumnos($id_alumno){
			$sql = "DELETE FROM `alumno` WHERE `id_alumno`=:id_alumno";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
	        $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
	        if($statement->execute()){
	        	$sql2 = "DELETE FROM `persona` WHERE `id`=:id_alumno";
	        	$this->conexion=conexion::getConexion();
				$statement=$this->conexion->prepare($sql2);
		        $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
		        $statement->execute();

	        }
		}



}

?>