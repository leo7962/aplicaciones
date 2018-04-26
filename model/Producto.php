<?php
  /**
   * Esta es una clase
   */
   require_once ("model/OT.php");
   require_once ("model/historial.php");


  class Producto 
  {
    private int $idProducto;
    private String $Productonombre;
    private int $Productocodigo;
    private historial $historial_idhistorial;
    private String $Productodescripcion;

    public function __GET($k)
    {
      return $this->$k;
    }
    public function __SET($k)
    {
      return $this->$k = $v;
    }
  }
  ?>
