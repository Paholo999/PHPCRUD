<?php

/*Se inicia sesion para persitir el mensaje definido*/
session_start();

/*Conexion base de datos*/
$conn = mysqli_connect(
    'localhost',
    'root',
    '123456789',
    'php_mysql_crud'
);


?>