<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/libs/conexion.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/model/clase/Quiz.php");

class QuizDAO{

	public function agregarQuiz($quiz){
		$quizJson = json_decode($quiz);
		$quiz = new Quiz($quizJson->titulo,$quizJson->descripcion,$quizJson->fecha_inicio,$quizJson->fecha_fin);
		#$quiz = new Quiz(3,'Quiz 1','Los voy a rajar ptos','2021-12-11','2021-12-15');
		$sql = "INSERT INTO `quiz`(`autor`,`titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES (:autor,:titulo,:descripcion,:fecha_inicio,:fecha_fin)";
		$this->conexion=conexion::getConexion();
		$statement=$this->conexion->prepare($sql);
		$statement->bindParam(":autor",$quiz->autor,PDO::PARAM_STR);
        $statement->bindParam(":titulo",$quiz->titulo,PDO::PARAM_STR);
        $statement->bindParam(":descripcion",$quiz->descripcion,PDO::PARAM_STR);
        $statement->bindParam(":fecha_inicio",$quiz->fecha_inicio,PDO::PARAM_STR);
        $statement->bindParam(":fecha_fin",$quiz->fecha_fin,PDO::PARAM_STR);
        $statement->execute();
        	
       }

       public function listarQuices($idProfesor){

			$sql = "SELECT * FROM `quiz` WHERE autor=:idProfesor";
			$this->conexion=conexion::getConexion();
			$statement=$this->conexion->prepare($sql);
			$statement->bindParam(":autor",$idProfesor,PDO::PARAM_STR);
			$statement->execute();

			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                array_push($quices, new Ejercicio($row["id"],$row["titulo"],$row["descripcion"],$row["fecha_inicio"],$row["fecha_fin"],$row["sin_fecha"],$row["autor"],$row["tipo_ejercicio"],$row["estado"]));
            }
			$quicesJson = json_decode($quices); 

	        return $quicesJson;
	}

	public function editarQuiz($quiz){
		$quizJson = json_decode($quiz);
		$quiz = new Quiz($quizJson->titulo,$quizJson->descripcion,$quizJson->fecha_inicio,$quizJson->fecha_fin);
		#$quiz = new Quiz(3,'Quiz 1','Los voy a rajar ptos','2021-12-11','2021-12-15');
		$sql = "UPDATE `quiz` SET `titulo`=:titulo, `descripcion`=:descripcion, `fecha_inicio`=:fecha_inicio, `fecha_fin`=:fecha_fin WHERE `id_quiz`=:id";;
		$this->conexion=conexion::getConexion();
		$statement=$this->conexion->prepare($sql);
		$statement->bindParam(":id",$quiz->id,PDO::PARAM_STR);
        $statement->bindParam(":titulo",$quiz->titulo,PDO::PARAM_STR);
        $statement->bindParam(":descripcion",$quiz->descripcion,PDO::PARAM_STR);
        $statement->bindParam(":fecha_inicio",$quiz->fecha_inicio,PDO::PARAM_STR);
        $statement->bindParam(":fecha_fin",$quiz->fecha_fin,PDO::PARAM_STR);
        $statement->execute();
        	
       }

	public function eliminarQuiz($id_quiz){
				$sql = "DELETE FROM `quiz` WHERE `id_quiz`=:id_quiz";
				$this->conexion=conexion::getConexion();
				$statement=$this->conexion->prepare($sql);
		        $statement->bindParam(":id_quiz",$id_quiz,PDO::PARAM_STR);
		        $statement->execute();        	
	}
			

}


?>