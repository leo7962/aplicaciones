<?php
  /**
   * Esta es una clase
   */
  class Producto
  {
    private int $idProducto;
    private String $Productonombre;
    private int $Productocodigo;
    private int $historial_idhistorial;
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
