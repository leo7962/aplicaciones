<?php
require_once ("model/Producto.php");
require_once ("model/ProductoModel.php");

//logica
$prd = new Producto();
$model = new ProductoModel();

if (isset($_REQUEST['action'])) {
  switch ($_REQUEST['action']) {

    case 'actualizar':
      $prd->__SET('idProducto',   $_REQUEST['idProducto']);
      $prd->__SET('Productonombre',   $_REQUEST['Productonombre']);
      $prd->__SET('Productocodigo',   $_REQUEST['Productocodigo']);
      $prd->__SET('historial_idhistorial',   $_REQUEST['historial_idhistorial']);
      $prd->__SET('Productodescripcion',   $_REQUEST['Productodescripcion]);

      $model->Actualizar($prd);
      header('Location: index.php');
      break;

  case 'registrar':
      $prd->__SET('idProducto',   $_REQUEST['idProducto']);
      $prd->__SET('Productonombre',   $_REQUEST['Productonombre']);
      $prd->__SET('Productocodigo',   $_REQUEST['Productocodigo']);
      $prd->__SET('historial_idhistorial',   $_REQUEST['historial_idhistorial']);
      $prd->__SET('Productodescripcion',   $_REQUEST['Productodescripcion]);

      $model->Actualizar($prd);
      header('Location: index.php');
      break;
  case 'eliminar':
      $model->Eliminar($_REQUEST['idProducto']);
      header('Location: index.php');
      break;
  case 'editar':
    $prd = $model->Obtener($_REQUEST['idProducto']);
    break;
  }
}?>
