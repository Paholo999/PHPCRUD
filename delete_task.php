
<?php
     
    include("db.php");

    

    if(isset($_GET['id'])){

        /*Obtener el dato enviado id*/
        $id = $_GET['id'];
        
        /* Consulta DELETE para eliminar todos los datos almacenados según el ID*/
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);

        
        /* Se no se obtiene una conexion*/
        if(!$result){
            die("Query failed");
        }

        /*Asignar valor a la variable session correspondiente*/
        $_SESSION['message'] = 'Task Removed succesfully';
        $_SESSION['message_type'] = 'danger';

        /*Devolver a la pagina principal*/
        header("Location: index.php");  
    }

?>