<?php
     
    include("db.php");

    if(isset($_GET['id'])){

        /*Obtener el dato enviado id*/
        $id = $_GET['id'];
        
        /* Consulta SELECT para obtener los datos almacenados según el ID*/
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            /*Asignar valor a la variable session correspondiente si se tiene una fila*/
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['descripcion'];
        }
    }

    /*Si se tiene datos del formulario con metodo POST realizar la siguiente parte*/
    if(isset($_POST['update'])){
        /*Obtener el dato enviado id*/
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

         /* Consulta UPDATE para actualizar los datos almacenados según el ID*/
        $query = "UPDATE task set title = '$title', descripcion = '$description' WHERE id = $id";
        mysqli_query($conn, $query);

        /*Asignar valor a la variable session correspondiente*/
        $_SESSION['message'] = 'Task Updated Succesfully';
        $_SESSION['message_type'] = 'warning';

        /*Devolver a la pagina principal*/
        header("Location: index.php");
    }
?>

<?php include("header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <?php /*Obtener datos de parte del usuario enviar por el metodo POST y realizar la parte del codigo*/ ?>
                <form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder=">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder=""><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php") ?>