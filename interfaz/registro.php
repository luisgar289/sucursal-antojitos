<?php

//Aqui se reciben los datos del formulario

$fname = val($_POST["fname"]);
$lname = val($_POST["lname"]);
$email = val($_POST["email"]);

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
$dbname = "bd_mysitio";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuarios (Nombre, Apellido, Correo)
VALUES ('$fname', '$lname', '$email')";

if ($conn->query($sql) === TRUE) {
	echo "Nuevo registro creado exitosamente";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
	
$conn->close();

//UPDATE `usuarios` SET `Correo` = 'peter@gmail.com' WHERE `usuarios`.`id` = 10;
?>