<?php
  include_once("model/Model.php");

  /**
   * aqui se agrega la clase del controlador
   */
  class Controller
  {
    public $model;

    public function __construct()
    {
      $this->model = new Model();
    }
    public function invoke()
    {
      if (lisset($_GET['book'])) {
        $books = $this->model->getBookList();
      }
    }
  }

 ?>
