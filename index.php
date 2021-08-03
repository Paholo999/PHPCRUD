
<?php /*Incluir el archivo de la conexion de la base de datos.*/
include("db.php") ?>


<?php /*Incluir el archivo donde se contiene la parte del header.*/ 
include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th> 
                    </tr> 
                </thead>  
                <tbody>
                    <?php 
                        /* Consulta SELECT para mostrar todos los datos almacenados*/
                        $query = "SELECT * FROM task";  
                        $result_tasks = mysqli_query($conn, $query);

                        /*Se concluye tal condicion cuando no existan más filas */
                        while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['created_at'] ?></td>
                                <td>
                                    
                                    <a href="edit.php?id=<?php /*Se crea enlace a la pagina determina con la ID respectiva*/ echo $row['id']?>" class="btn btn-secondary">
                                        Edit
                                    </a>
                                    <a href="delete_task.php?id=<?php /*Se crea enlace a la pagina determina con la ID respectiva*/ echo $row['id']?>" class="btn btn-danger"x>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                </tbody>  
            </table>
        </div>
        
        
        <div class="col-md-4">
            <?php /*Si no es null mostrar el mensaje de la variable session*/ if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php /* Se libera la variable session */session_unset(); }?>        

        <div class="card card-body">
            <form action="save_task.php" method="POST">
                <div class="mb-3" >
                    <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>  
                </div>
                <div class="mb-3" >
                    <textarea name="description" rows="2" class="form-control" placeholder="Task description"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task" >
            </form>            
        </div>
        </div>
    </div>
</div>

<?php /*Incluir el archivo donde se contiene la parte del footer.*/ 
include("includes/footer.php") ?>