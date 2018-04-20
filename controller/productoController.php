<?php
  inclued_once("model/productoModel.php");
  /**
   *
   */
  class controllerModel
  {
    public $ProductoModel;
    public function __construct()
    {
      $this->productoModel = new Producto();
    }

  }

 ?>
