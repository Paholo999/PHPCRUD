<?php

    include("db.php");

    /*Si se tiene datos del formulario con metodo POST realizar la siguiente parte*/
    if(isset($_POST['save_task'])){
        $title = $_POST['title'];
        $description = $_POST['description'];

        /* Consulta INSERT INTO para ingresar los datos según lo obtenido de parte del usuario*/
        $query = "INSERT INTO task(title,descripcion) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }
        
        $_SESSION['message'] = 'Task Saved succesfully';
        $_SESSION['message_type'] = 'success';


        header("Location: index.php");
    }
?>