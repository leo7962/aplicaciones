<?php
require ('controller/includes.php');
$db = DataBase::singleton();
// $config = Config::singleton();
$consulta = $db->executeQue("select * from Producto");
$total = $db->numRows($consulta);
$productos = null;
if ($total > 0) {
while ($row = $db->arrayResult($consulta)) {
$productos[] = array('id' => $row['idProducto'],
  'nombre' => $row['Productonombre']);
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>ENCUESTA</title>
		<style>
			table{ border: 1px solid #f2f2f2; text-align: center; padding: 10px; }
			table thead td { font-weight: bold; }
			td{ border: 1px solid #8c0000; border: 1px solid #8c0000; padding: 10px; font-family: verdana; }

		</style>
	</head>
	<body>
		<table>
			<thead>
				<td>Identificador carrera </td>
				<td>Nombre carrera</td>
			</thead>
		    <tbody>
		<?php foreach($productos as $value){?>
		<tr>
		 <td><?php echo $value['id']?></td>
		 <td><?php echo $value['nombre']?></td>
		</tr>
		<?php }?>
		 </tbody>
		</table>
	</body>
</html>
