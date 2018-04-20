<?php
  inclued_once("model/osModel.php");
  class osController
  {
    public $productoOS;
    public function __construct()
    {
      $this->productoOS = new ProductoOS();
    }
  }


 ?>
