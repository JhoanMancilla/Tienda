<?php 
/**
 * summary
 */
require_once("clase/Alumno.php");
require_once("clase/Curso.php");
require_once("clase/Profesor.php");
require_once("clase/Ejercicio.php");
require_once("clase/Quiz.php");
class ProfesoresModel extends Model
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    
    public function agregarAlumnos($alumno){
        $id_curso=$alumno[0];
        $alumnos=$alumno[1];
        foreach ($alumnos as $alumno) {
            $sql = "INSERT INTO `persona`(`nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES (:nombre,:apellido,:correo,:clave,:tipo_persona)";
            $tipo_persona='Alumno';
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":nombre",$alumno[0],PDO::PARAM_STR);
            $statement->bindParam(":apellido",$alumno[1],PDO::PARAM_STR);
            $statement->bindParam(":correo",$alumno[2],PDO::PARAM_STR);
            $statement->bindParam(":clave",$alumno[3],PDO::PARAM_STR);
            $statement->bindParam(":tipo_persona",$tipo_persona,PDO::PARAM_STR);
             if($alumno[0]!=null){
                $statement->execute();
                $id_alumno=$this->conexion->lastInsertId();
                $sql2 = "INSERT INTO `alumno`(`id_alumno`, `codigo`, `institucion`) VALUES (:id_alumno,:codigo,:institucion)";
                $this->conexion=conexion::getConexion();
                $statement=$this->conexion->prepare($sql2);
                $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
                $statement->bindParam(":codigo",$alumno[3],PDO::PARAM_STR);
                $statement->bindParam(":institucion",$alumno[4],PDO::PARAM_STR);
                $statement->execute();
                $sql3 = "INSERT INTO `alumno_curso` (`id_alumno`, `id_curso`) VALUES (:id_alumno,:id_curso)";
                $this->conexion=conexion::getConexion();
                $statement=$this->conexion->prepare($sql3);
                $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
                $statement->bindParam(":id_curso",$id_curso,PDO::PARAM_STR);
                $statement->execute();
             }
        }return json_encode(array("estado" => 1)); 
    }
    public function agregarAlumno($alumno){
        $sql = "INSERT INTO `persona`(`nombre`, `apellido`, `correo`, `clave`, `tipo_persona`) VALUES (:nombre,:apellido,:correo,:clave,:tipo_persona)";
        $tipo_persona='Alumno';
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":nombre",$alumno->nombre,PDO::PARAM_STR);
        $statement->bindParam(":apellido",$alumno->apellido,PDO::PARAM_STR);
        $statement->bindParam(":correo",$alumno->correo,PDO::PARAM_STR);
        $statement->bindParam(":clave",$alumno->codigo,PDO::PARAM_STR);
        $statement->bindParam(":tipo_persona",$tipo_persona,PDO::PARAM_STR);
         if($statement->execute()){
            $id_alumno=$this->conexion->lastInsertId();
            $sql2 ="INSERT INTO `alumno`(`id_alumno`, `codigo`, `institucion`) VALUES (:id_alumno,:codigo,:institucion)";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql2);
            $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
            $statement->bindParam(":codigo",$alumno->codigo,PDO::PARAM_STR);
            $statement->bindParam(":institucion",$alumno->institucion,PDO::PARAM_STR);
            $statement->execute();
            $sql3 = "INSERT INTO `alumno_curso` (`id_alumno`, `id_curso`) VALUES (:id_alumno,:id_curso)";
            $this->conexion=conexion::getConexion();
            $statement=$this->conexion->prepare($sql3);
            $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
            $statement->bindParam(":id_curso",$alumno->curso,PDO::PARAM_STR);
            $statement->execute();
             }
        return json_encode(array("estado" => 1)); 
    }

    public function listarCursos(){
        $sql = "SELECT id_curso, codigo_curso, fecha_inicio, fecha_fin FROM `curso` WHERE `estado`=1";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $items=array();
        if($statement->execute()){
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                 array_push($items, new Curso($row['id_curso'],$row['codigo_curso'],$row['fecha_inicio'],$row['fecha_fin']));
            }
            return json_encode(array("estado" => 1, "items"=>$items));
        }
            return json_encode(array("estado" => 0));
    }


    public function listarAlumnos($id_curso){
        $sql = "SELECT p.id,p.nombre,p.apellido,p.correo,a.codigo,a.institucion FROM `persona`p INNER JOIN alumno a on a.id_alumno=p.id INNER JOIN alumno_curso ac on ac.id_alumno=a.id_alumno WHERE ac.id_curso=:id_curso AND ac.estado=1";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":id_curso",$id_curso,PDO::PARAM_STR);
        $items=array();
        if($statement->execute()){
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                array_push($items, new Alumno($row['id'],$row['nombre'],$row['apellido'],$row['correo'],$row['codigo'],$row['institucion']));      
            }
            return json_encode(array("estado" => 1, "items"=>$items));
        }
            return json_encode(array("estado" => 0));
    }

    public function eliminarAlumno($id_alumno){
        $sql = "UPDATE `alumno_curso` SET `estado`=0 WHERE `id_alumno`=:id_alumno";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":id_alumno",$id_alumno,PDO::PARAM_STR);
        if($statement->execute()){
            return json_encode(array("estado" => 1));
        }else{
            return json_encode(array("estado" => 0));
        }
    }


    public function listarEjercicios($id_curso){
        $profesor=$_SESSION['profesor'];
        $idProfesor=$profesor->getId();
        $sql = "SELECT * FROM `ejercicio` WHERE autor=:idProfesor AND estado=1 AND id_curso=:idCurso";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":idProfesor",$idProfesor,PDO::PARAM_STR);
        $statement->bindParam(":idCurso",$id_curso,PDO::PARAM_STR);
        $items=array();
        if($statement->execute()){
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            array_push($items, new Ejercicio($row["id"],$row["titulo"],$row["descripcion"],$row["fecha_inicio"],$row["fecha_fin"],$row["sin_fecha"],$row["autor"],$row["tipo_ejercicio"],$row['id_curso']));
            }
            return json_encode(array("estado" => 1,"items"=>$items));
       }else{
            return json_encode(array("estado" => 0));
       }
    }

    public function eliminarEjercicio($id_ejercicio){
        $sql = "UPDATE `ejercicio` SET `estado`=0 WHERE `id`=:id_ejercicio";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":id_ejercicio",$id_ejercicio,PDO::PARAM_STR);
        if($statement->execute()){
            return json_encode(array("estado" => 1));
        }else{
            return json_encode(array("estado" => 0));
        }
    }


    public function agregarEjercicio($ejercicio){
        $id_curso=$ejercicio[5];
        $profesor=$_SESSION['profesor'];
        $idProfesor=$profesor->getId();
        $sql = "INSERT INTO `ejercicio` (`titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `autor`, `tipo_ejercicio`, `id_curso`) VALUES (:titulo,:descripcion,:fecha_inicio,:fecha_fin,:idProfesor,:tipo_ejercicio ,:id_curso)";
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":titulo",$ejercicio[0],PDO::PARAM_STR);
        $statement->bindParam(":descripcion",$ejercicio[1],PDO::PARAM_STR);
        $statement->bindParam(":fecha_inicio",$ejercicio[2],PDO::PARAM_STR);
        $statement->bindParam(":fecha_fin",$ejercicio[3],PDO::PARAM_STR);
        $statement->bindParam(":idProfesor",$idProfesor,PDO::PARAM_STR);
        $statement->bindParam(":tipo_ejercicio",$ejercicio[4],PDO::PARAM_STR);
        $statement->bindParam(":id_curso",$id_curso,PDO::PARAM_STR);
        $statement->execute();
        return json_encode(array("estado" => 1));
    }

    public function listarQuiz($id_curso){
        $profesor=$_SESSION['profesor'];
        $idProfesor=$profesor->getId();
        $sql = "SELECT * FROM `quiz` WHERE autor=:idProfesor AND estado=1 AND id_curso=:idCurso";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":idProfesor",$idProfesor,PDO::PARAM_STR);
        $statement->bindParam(":idCurso",$id_curso,PDO::PARAM_STR);
        $items=array();
        if($statement->execute()){
            while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            array_push($items, new Quiz($row["id_quiz"],$row["titulo"],$row["descripcion"],$row["fecha_inicio"],$row["fecha_fin"],$row["autor"],$row['id_curso']));
            }
            return json_encode(array("estado" => 1,"items"=>$items));
       }else{
            return json_encode(array("estado" => 0));
       }
    }

    public function eliminarQuiz($id_quiz){
        $sql = "UPDATE `quiz` SET `estado`=0 WHERE `id`=:id_quiz";
        $this->conexion=conexion::getConexion();
        $statement=$this->conexion->prepare($sql);
        $statement->bindParam(":id_quiz",$id_quiz,PDO::PARAM_STR);
        if($statement->execute()){
            return json_encode(array("estado" => 1));
        }else{
            return json_encode(array("estado" => 0));
        }
    }


    public function agregarQuiz($quiz){
        $profesor=$_SESSION['profesor'];
        $idProfesor=$profesor->getId();
            $sql = "INSERT INTO `quiz` (`titulo`, `descripcion`, `fecha_inicio`, `fecha_fin`, `autor`, `id_curso`) VALUES (:titulo,:descripcion,:fecha_inicio,:fecha_fin,:idProfesor ,:id_curso)";
            $statement=$this->conexion->prepare($sql);
            $statement->bindParam(":titulo",$quiz->titulo,PDO::PARAM_STR);
            $statement->bindParam(":descripcion",$quiz->descripcion,PDO::PARAM_STR);
            $statement->bindParam(":fecha_inicio",$quiz->fecha_inicio,PDO::PARAM_STR);
            $statement->bindParam(":fecha_fin",$quiz->fecha_fin,PDO::PARAM_STR);
            $statement->bindParam(":idProfesor",$idProfesor,PDO::PARAM_STR);
            $statement->bindParam(":id_curso",$quiz->curso,PDO::PARAM_STR);
            $statement->execute();
        return json_encode(array("estado" => 1)); 
    }






}
 ?>