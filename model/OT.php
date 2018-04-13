<?php
  /**
   *
   */
  class OT
  {
    private int $idOT;
    private String $OTnombre;
    private int $OS_idOS;
    private int $Producto_idProducto;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v;
  }

 ?>
