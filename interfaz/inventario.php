<!DOCTYPE html>
<html>
<head>
<title>Inventario</title>
</head>
<body>
<h1> Ganancia </h1>

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "antojitos";
  //Crear conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  //checar conexión
  if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->conect_error);
  }

  $sql1 = "SELECT Ingrediente, SUM(Costo) FROM ingredientes";
  $result = $conn->query($sql1);
  ?>
  <table width="300" border="1" cellspacing="1" cellpadding="1">

      <?php
      if ($result->num_rows > 0) {
          //salida de datos de cada fila
          while($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td>Inversion</td>
            <td><?php echo $row["SUM(Costo)"]; ?></td>		
          </tr>
      <?php
          }
      ?>
  <?php
      } else {
          echo"0 resultados";
      }
  $sql = "SELECT idPedido, SUM(Costo_total) FROM pedido";
  $result = $conn->query($sql);
  ?>
  <table width="300" border="1" cellspacing="1" cellpadding="1">


      <?php
      if ($result->num_rows > 0) {
          //salida de datos de cada fila
          while($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td>Venta total</td>
            <td><?php echo $row["SUM(Costo_total)"]; ?></td>		
          </tr>
      <?php
          }
      ?>
      </table>
  <?php
      } else {
          echo"0 resultados";
      }
  $conn->close();
  ?>
<div>
<h5> Reste la Inversion a la Venta Total para obtener la ganacia neta </h5>
<div>
<form method="POST" oninput="resultado.value=parseInt(valor1.value)-parseInt(valor2.value)">
    <input type="number" id="valor1" value="0"> -
    <input type="number" id="valor2" value="0"> =
    <output name="resultado" for="valor1 valor2"></output>
</form>

</body>
</html>
