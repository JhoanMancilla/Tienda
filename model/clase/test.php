<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("ProfesorDAO.php");
require_once("ejercicioDAO.php");

require_once("Quiz.php");
require_once("QuizDAO.php");


$profe= new EjercicioDAO();

$profe->editarEjercicio();



?>
<!DOCTYPE html>
<html>
 <head>
  <title>Subir Profesores usando csv</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Agrega varios profesores a la vez</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data' action="subidas.php">
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <h3 align="center">Deals of the Day</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Category</th>
      <th>Product Name</th>
      <th>Product Price</th>
     </tr>  
    </table>
   </div>
  </div>
 </body>
</html>
