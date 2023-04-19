<?php

//configurar a conexão com o banco de dados, utilizei o metodo MySQLI

$host = "localhost";
$bancodedados = "loja";
$user = "root";
$password = "";

$mysqli = new mysqli($host, $user, $password, $bancodedados);

// $mysqli= mysqli_connect($host, $user, $password, $bancodedados);





