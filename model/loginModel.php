<?php 
require_once("clase/Profesor.php");
require_once("clase/Alumno.php");
require_once("clase/Administrador.php");

class loginModel extends Model
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function valida($correo,$clave){
    	try {
    	$sql="SELECT p.id,p.nombre,p.apellido,p.tipo_persona FROM `persona` p WHERE p.correo=:correo AND p.clave=:clave";
    	$statement=$this->conexion->prepare($sql);
        $statement->bindParam(":correo",$correo,PDO::PARAM_STR);
        $statement->bindParam(":clave",$clave,PDO::PARAM_STR);
        $tipoUsuario="";
    	if ($statement->execute()) {
    		$row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row["tipo_persona"]=="Administrador") {
                $sqlAdmin="SELECT pe.id,pe.nombre,pe.apellido FROM `persona`pe INNER JOIN administrador a on a.id_administrador=pe.id WHERE pe.id=:id";
                $statementAd=$this->conexion->prepare($sqlAdmin);
                $statementAd->bindParam(":id",$row["id"],PDO::PARAM_STR);
                $statementAd->execute();
                $rowAd = $statementAd->fetch(PDO::FETCH_ASSOC);
                $tipoUsuario=$row["tipo_persona"];
                $usuario = new Administrador($rowAd["id"],$rowAd["nombre"],$rowAd["apellido"],$correo,$clave,$tipoUsuario,"x");
                session_start();
                $_SESSION['administrador']=$usuario;
                return json_encode(array("estado" => 1));
            }else if($row["tipo_persona"]=="Profesor"){
                $sqlProfesor="SELECT pe.id,pe.nombre,pe.apellido,p.institucion,p.codigo FROM `persona`pe INNER JOIN profesor p on p.id_profesor=pe.id WHERE pe.id=:id";
                $statementP=$this->conexion->prepare($sqlProfesor);
                $statementP->bindParam(":id",$row["id"],PDO::PARAM_INT);
                $statementP->execute();
                $rowP = $statementP->fetch(PDO::FETCH_ASSOC);
                $tipoUsuario=$row["tipo_persona"];
                $usuario = new Profesor($rowP["id"],$rowP["nombre"],$rowP["apellido"],$correo,$rowP["codigo"],$rowP["institucion"]);    
                session_start();
                $_SESSION['profesor']=$usuario;
                return json_encode(array("estado" => 2));
            }else if($row["tipo_persona"]=="Alumno"){
                $sqlAlumno="SELECT pe.id,pe.nombre,pe.apellido,a.institucion,a.codigo FROM `persona`pe INNER JOIN alumno a on a.id_alumno=pe.id WHERE pe.id=:id";
                $statementA=$this->conexion->prepare($sqlAlumno);
                $statementA->bindParam(":id",$row["id"],PDO::PARAM_STR);
                $statementA->execute();
                $rowA = $statementA->fetch(PDO::FETCH_ASSOC);
                $tipoUsuario=$row["tipo_persona"];
                $usuario = new Alumno($rowA["id"],$rowA["nombre"],$rowA["apellido"],$correo,$clave,$tipoUsuario,$rowA["codigo"],$rowA["institucion"]);
                session_start();
                    $_SESSION['alumno']=$usuario;  
                return json_encode(array("estado" => 3));
            }else{return json_encode(array("estado" => 0));}
    	} else{
            return json_encode(array("estado" => -1));
        }
    	} catch (Exception $e) {
    		return json_encode(array("estado" => -2));
    	}
    }
}
 ?>