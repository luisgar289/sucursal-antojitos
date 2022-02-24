<?php

//Aqui se reciben los datos del formulario

$iantojito= val($_POST["iantojito"]);
$antojito = val($_POST["antojito"]);
$precio = val($_POST["precio"]);
$ingrediente = val($_POST["ingrediente"]);

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

$sql = "INSERT INTO antojitos (idAntojito,Antojitos, Precio, ingrediente_idIngrediente)
VALUES ('$iantojito', '$antojito', '$precio', '$ingrediente')";

if ($conn->query($sql) === TRUE) {
	echo "Nuevo registro creado exitosamente";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
	
$conn->close();

//UPDATE `usuarios` SET `Correo` = 'peter@gmail.com' WHERE `usuarios`.`id` = 10;
?>