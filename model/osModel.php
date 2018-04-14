<?php
inclued_once("model/OS.php");

class ClassName
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

      $stm = $this->pdo->prepare("SELECT * FROM OS");
      $stm->execute();

      foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
        $ort = new OS();

        $ort->__SET('idOS', $r->idOS);
        $ort->__SET('OSnombre', $r->OSnombre);

        $result[] = $ort;
      }

      return $result;

    } catch (Exception $e) {
        die($e->getMessage());
    }

  }

  public function Obtener($idOS)
  {
    try {
      $stm= $this->pdo->prepare("SELECT * FROM OS WHERE idOS =?");
      $stm->execute(array($idOS));
      $r = $stm->fetch(PDO::FETCH_OBJ);

      $ort = new OS();

      $ort->__SET('idOS', $r->idOS);
      $ort->__SET('OSnombre', $r->OSnombre);


      return $ort;

    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
  public function Eliminar($idOS)
  {
    try {
      $stm= $this->pdo->prepare("SELECT * FROM OS WHERE idOS =?");
      $stm->execute(array($idOS));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
  public function Actualizar(OS $data)
  {
    try {
        $sql = "UPDATE OS SET
                    OSnombre =?,
                    WHERE idOS = ?";

        $this->pdo->prepare($sql)->execute(array(
                    $data->__GET('OSnombre'),

        ));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  public function Registrar(OS $data)
  {
    try {
      $sql = "INSERT INTO OS (OSnombre)
      VALUES (?)";

      $this->pdo->prepare($sql)->execute(array(
                  $data->__GET('OSnombre'),

      ));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }
}
?>
