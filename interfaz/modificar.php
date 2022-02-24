<?php

//Aqui se reciben los datos del formulario

$costo = val($_POST["costo"]);
$cantidad = val($_POST["cantidad"]);
$id = val($_POST["id"]);

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//Son los parametros necesarios para conectarse con la BD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "antojitos";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `ingredientes` SET `Costo` = '$costo', `Cantidad` = '$cantidad' WHERE `ingredientes`.`idIngrediente` = $id";

if ($conn->query($sql) === TRUE) {
	echo "Nuevo registro creado exitosamente";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
	
$conn->close();

//UPDATE `usuarios` SET `Correo` = 'peter@gmail.com' WHERE `usuarios`.`id` = 10;
?>