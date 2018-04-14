<?php
  /**
   *
   */
  inclued_once("model/Producto.php");
  class ProductoModel
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

        $stm = $this->pdo->prepare("SELECT * FROM Producto");
        $stm->execute();

        foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
          $prd = new Producto();

          $prd->__SET('idProducto', $r->idProducto);
          $prd->__SET('Productonombre', $r->Productonombre);
          $prd->__SET('Productocodigo', $r->Productocodigo);
          $prd->__SET('historial_idhistorial', $r->historial_idhistorial);
          $prd->__SET('$Productodescripcion', $r->$Productodescripcion);

          $result[] = $prd;
        }

        return $result;

      } catch (Exception $e) {
          die($e->getMessage());
      }

    }

    public function Obtener($idProducto)
    {
      try {
        $stm= $this->pdo->prepare("SELECT * FROM Productos WHERE idProducto =?");
        $stm->execute(array($idProducto));
        $r = $stm->fetch(PDO::FETCH_OBJ);

        $prd = new Producto();

        $prd->__SET('idProducto', $r->idProducto);
        $prd->__SET('Productonombre', $r->Productonombre);
        $prd->__SET('Productocodigo', $r->Productocodigo);
        $prd->__SET('historial_idhistorial', $r->historial_idhistorial);
        $prd->__SET('$Productodescripcion', $r->$Productodescripcion);

        return $prd;

      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
    public function Eliminar($idProducto)
    {
      try {
        $stm= $this->pdo->prepare("SELECT * FROM Productos WHERE idProducto =?");
        $stm->execute(array($idProducto));
      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
    public function Actualizar(Producto $data)
    {
      try {
          $sql = "UPDATE Producto SET
                      Productonombre =?,
                      Productocodigo =?,
                      historial_idhistorial =?
                      Productodescripcion =?
                      WHERE idProducto = ?";

          $this->pdo->prepare($sql)->execute(array(
                      $data->__GET('Productonombre'),
                      $data->__GET('Productocodigo'),
                      $data->__GET('historial_idhistorial'),
                      $data->__GET('Productodescripcion')
          ));
      } catch (Exception $e) {
          die($e->getMessage());
      }
    }

    public function Registrar(Producto $data)
    {
      try {
        $sql = "INSERT INTO Productos (Productonombre, Productocodigo, historial_idhistorial, Productodescripcion)
        VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)->execute(array(
                    $data->__GET('Productonombre'),
                    $data->__GET('Productocodigo'),
                    $data->__GET('historial_idhistorial'),
                    $data->__GET('Productodescripcion')
        ));
      } catch (Exception $e) {
          die($e->getMessage());
      }
    }
  }
  ?>
