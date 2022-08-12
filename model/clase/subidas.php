<?php

require_once("ProfesorDAO.php");
require_once("EjercicioDAO.php");
require_once("QuizDAO.php");
require_once("AlumnoDAO.php");

if(isset($_POST["uploadProfesor"]))
{
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");

    $i=0;
   while($data = fgetcsv($handle))
   {

    	$items= array("nombre" => $data[0], "apellido"=>$data[1], "correo"=>$data[2], "clave"=>$data[3], "tipo_persona" =>$data[4],"codigo"=>$data[5], "institucion"=>$data[6]);	
   		$profesor = new ProfesorDAO();
   		$profesor->agregarProfesor(json_encode($items));

   }
   fclose($handle);
   header('Location: http://noanlearning.space/model/clase/test.php');
  }
  
 }

}else if(isset($_POST["uploadEjercicio"])){

    if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");

    $i=0;
   while($data = fgetcsv($handle))
   {

        $items= array("titulo" => $data[0], "descripcion"=>$data[1], "fecha_inicio"=>$data[2], "fecha_fin"=>$data[3], "sin_fecha" =>$data[4],"autor"=>$data[5], "estado"=>$data[6]);    
        $ejercicio = new EjercicioDAO();
        $ejercicio->agregarEjercicio(json_encode($items));

   }
   fclose($handle);
   header('Location: http://noanlearning.space/model/clase/test.php');
  }
  
 }

}else if(isset($_POST["uploadQuiz"])){

  if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");

    $i=0;
   while($data = fgetcsv($handle))
   {

        $items= array("nombre" => $data[0], "apellido"=>$data[1], "correo"=>$data[2], "clave"=>$data[3], "tipo_persona" =>$data[4],"codigo"=>$data[5], "institucion"=>$data[6]); 
        $alumno = new AlumnoDAO();
        $alumno->agregarAlumno(json_encode($items));

   }
   fclose($handle);
   header('Location: http://noanlearning.space/model/clase/test.php');
  }
  
 }


}else if(isset($_POST["uploadAlumno"])){

    if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");

    $i=0;
   while($data = fgetcsv($handle))
   {

        $items= array("titulo" => $data[0], "descripcion"=>$data[1], "fecha_inicio"=>$data[2], "fecha_fin"=>$data[3]);    
        $quiz = new QuizDAO();
        $quiz->agregarQuiz(json_encode($items));

   }
   fclose($handle);
   header('Location: http://noanlearning.space/model/clase/test.php');
  }
  
 }

}

?>