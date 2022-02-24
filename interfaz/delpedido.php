<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "antojitos";

//crear conexion
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error) {
	die("Conexion fallida: " . $conn->connect_error);
}
$id = $_GET["idPedido"];
// sql to delete a record
$sql = "DELETE FROM pedido WHERE idPedido = '$id'";
if ($conn->query($sql) === TRUE) {
	echo "Registro eliminado exitosamente";
} else {
	echo "Error borrando registro: " . $conn->error;
}
$conn->close();
?>
 




