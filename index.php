<?php include("bd.php")?>
<?php include("includes/header.php")?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4 row-md-7">


            <?php
                if(isset($_SESSION['message'])){ ?>

                <div class="alert alert-<?-$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

            <?php session_unset(); } ?> 
                    <!-- limpiar los mensajes de sesion-->

            <div class="card card-body">
                <form action="savetask.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control"
                        placeholder="Agregar tarea" autofocus>
                    </div>
                    <div class="form-group">
                            <textarea name="descripcion" rows="2" class="form-control"
                            placeholder="Detail">
                            </textarea>
                    </div>
                    <div class="form-group">
                    <input type="text" name="stage" class="form-control"
                        placeholder="Posicion en el tablero" autofocus>
                    </div>
                    <div class="form-group">
                    <input type="text" name="start" class="form-control"
                        placeholder="Fecha de inicio" autofocus>
                    </div>
                    <div class="form-group">
                    <input type="text" name="due" class="form-control"
                        placeholder="Fecha de vencimiento" autofocus>
                    </div>
          
                  
                    <input type="submit" class="btn btn-dark btn-block"
                    name="savetask" value="Guardar tarea">
                </form>
            </div>
        </div>
        
        <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Stage</th>
                                <th>Start</th>
                                <th>Due</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //seleccionar datos de la tabla
                            $query = "SELECT * FROM tarea";
                            //devolver datos
                            $result_task = mysqli_query($conn,$query);
                            //recorrer para imprimir
                            while($row= mysqli_fetch_array($result_task)){?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['descripcion']?></td>
                                    <td><?php echo $row['stage']?></td>
                                    <td><?php echo $row['start']?></td>
                                    <td><?php echo $row['due']?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']?>"
                                        class="btn btn-secondary">
                                         <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="delete.php?id=<?php echo $row['id']?>"
                                        class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                            
                        </tbody>
                    </table>
        </div>
    </div>

</div>

<?php include("includes/footer.php")?>