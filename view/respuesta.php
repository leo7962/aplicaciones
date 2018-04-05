<?php
require ('controller/includes.php');
$db = DataBase::singleton();

$opselect = $_GET["carrera"];
// $config = Config::singleton();
$consulta = $db->executeQue("select * from carrera where idcarrera =".$opselect);
$total = $db->numRows($consulta);
$alumnos = null;
if ($total > 0) {
while ($row = $db->arrayResult($consulta)) {
$carreras[] = array('id' => $row['idcarrera'],
 'nombre' => $row['nombre']);
}
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title></title>
 <link rel="stylesheet" href="">
</head>
<body>
 el usuario selecciono la respuesta <h1><?php echo $opselect ?></h1>
 <select name="carrera">
     <?php foreach($carreras as $value){ ?>
       <option value="<?php echo $value['id']?>">
         <?php echo $value['nombre']?>

       </option>
     <?php }?>
   </select>
</body>
</html>
