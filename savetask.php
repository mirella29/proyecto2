<?php

include("bd.php");

if(isset($_POST['savetask'])){
   // echo 'saving';
   
   $id = $_POST['id'];
   $nombre = $_POST['nombre'];
   $descripcion = $_POST['descripcion'];
   
   $startdate_task = $_POST['stage'];
   $duedate_task = $_POST['start'];
   $parentId_task = $_POST['due'];
 
   $query = "INSERT INTO tarea(nombre, descripcion,stage,start,due)
    values ('$nombre','$descripcion','$stage','$start','$due')";
   $result = mysqli_query($conn,$query);

   if(!$result){
       die("Query failed");
   }
   //echo 'saved';


   $_SESSION['message']='Task Saved succesfully';
   $_SESSION['message_type'] = 'success';

   //redireccionar despues de guardar los datos
   header("Location: index.php");


}
?>