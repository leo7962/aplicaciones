<?php
inclued_once("model/OT.php");
inclued_once("model/OS.php");
include_once("model/Producto.php");

class ClassName extends OS
{
  private $pdo;
  public function __construct()
  {
    try {
      $this->pdo = new PDO('mysql:host =localhost; dbname=test','root','');
      $this->pdo = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
  public function Listar()
  {
    try {
      $result = array();

      $stm = $this->pdo->prepare("SELECT * FROM OT");
      $stm->execute();

      foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
        $ort = new OT();

        $ort->__SET('idOT', $r->idOT);
        $ort->__SET('OTnombre', $r->OTnombre);
        $ort->__SET('OS_idOS', $r->OS_idOS);
        $ort->__SET('Producto_idProducto', $r->Producto_idProducto);


        $result[] = $ort;
      }

      return $result;

    } catch (Exception $e) {
        die($e->getMessage());
    }

  }

  public function Obtener($idOT)
  {
    try {
      $stm= $this->pdo->prepare("SELECT * FROM OT WHERE idOT =?");
      $stm->execute(array($idOS));
      $r = $stm->fetch(PDO::FETCH_OBJ);

      $ort = new OT();

      $ort->__SET('idOT', $r->idOT);
      $ort->__SET('OTnombre', $r->OTnombre);
      $ort->__SET('OS_idOS', $r->OS_idOS);
      $ort->__SET('Producto_idProducto', $r->Producto_idProducto);


      return $ort;

    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
  public function Eliminar($idOS)
  {
    try {
      $stm= $this->pdo->prepare("SELECT * FROM OT WHERE idOT =?");
      $stm->execute(array($idOS));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
  public function Actualizar(OS $data)
  {
    try {
        $sql = "UPDATE OT SET
                    OTnombre =?,
                    OS_idOS =?,
                    Producto_idProducto=?
                    WHERE idOS = ?";

        $this->pdo->prepare($sql)->execute(array(
                    $data->__GET('OTnombre'),
                    $data->__GET('OS_idOS'),
                    $data->__GET('Producto_idProducto'),
        ));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  public function Registrar(OT $data)
  {
    try {
      $sql = "INSERT INTO OT (OTnombre)
      VALUES (?)";

      $this->pdo->prepare($sql)->execute(array(
                  $data->__GET('OTnombre'),

      ));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
}
?>
