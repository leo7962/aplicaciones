<?php
inclued_once('model/ProductoModel.php');

class OS
{
private int $idOS;
private String $OSnombre;

 public function __GET($k){return $this->$k; }
 public function __SET($k, $v){return $this->$k = $v;}
}
 ?>
