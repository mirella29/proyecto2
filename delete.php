<?php 

include('bd.php');
//obtener id 
if(isset($_GET['id'])){
   
    $id = $_GET['id'];
    $query = "DELETE FROM tarea WHERE id= $id";

    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query failed");
    }
    $_SESSION['message']='tarea removida';
    $_SESSION['message_type']='danger';
  
    header("Location: index.php");

}

?>