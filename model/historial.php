<?php
  /**
   * creando el historial
   */
  class historial
  {
    private int $idhistorial;
    private String $seguimiento;
    public function __GET($k)
    {
      return $this->$k;
    }
    public function __SET($k, $v)
    {
      return $this ->$k = $v;
    }
  }
  ?>
