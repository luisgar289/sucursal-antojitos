<!DOCTYPE html>
<html>
<head>
<title>Pedidos</title>
</head>
<body>
<h1> Pedidos </h1>

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

  $sql = "SELECT idPedido, Costo_total, cliente_idCliente, antojito_idAntojito FROM pedido";
  $result = $conn->query($sql);
  ?>
  <table width="300" border="1" cellspacing="1" cellpadding="1">


      <?php
      if ($result->num_rows > 0) {
          //salida de datos de cada fila
          while($row = $result->fetch_assoc()) {
      ?>
          <tr>
            <td>idPedido</td>
            <td><?php echo $row["idPedido"]; ?></td>
            <td><a href="delpedido.php?id=<?php echo $row["idPedido"] ?>">Borrar</a></td>
          </tr>
          <tr>
            <td>Costo_total</td>
            <td><?php echo $row["Costo_total"]; ?></td>
            <td>&nbsp;</td>		
          </tr>
          <tr>
            <td>cliente_idCliente</td>
            <td><?php echo $row["cliente_idCliente"]; ?></td>
            <td>&nbsp;</td>		
          </tr>
          <tr>
            <td>antojito_idAntojito</td>
            <td><?php echo $row["antojito_idAntojito"]; ?></td>
            <td>&nbsp;</td>		
          </tr>
      <?php
          }
      ?>
      </table>
      <?php
      ?>
          <button><a href="dallpedidos.php?">Borrar Todo</a></button>
      <?php
      ?>

  <?php
      } else {
          echo"0 resultados";
      }

  $conn->close();
  ?>

</body>
</html>
