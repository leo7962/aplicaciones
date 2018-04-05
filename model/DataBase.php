<?php


class DataBase {

    private static $instance;
    private $conexion;
    private $config;

    public function __construct() {

        $this->config = Config::singleton();
        if ($this->config->get('dbtype') == "postgres") {
            $this->conexion = pg_connect("host=" . $this->config->get('dbhost') .
                    " port=" . $this->config->get('dbport') .
                    " dbname=" . $this->config->get('dbname') .
                    " user=" . $this->config->get('dbuser') .
                    " password=" . $this->config->get('dbpass')) or die("No se pudo conectar al servidor de base de datos" . pg_last_error($this->conexion));
        } elseif ($this->config->get('dbtype') == "mysql") {
            $this->conexion = mysql_connect($this->config->get('dbhost'), $this->config->get('dbuser'), $this->config->get('dbpass')) or die("no se pudo conectar al servidor de base de datos");
            mysql_select_db($this->config->get('dbname'), $this->conexion) or die("no se ha encontrado la base de datos" . mysql_error());
        }
    }

    function executeQue($query) {
        $rs = null;
        if ($this->config->get('dbtype') == "postgres") {
            $rs = pg_query($this->conexion, $query);
        } else if ($this->config->get('dbtype') == "mysql") {
            $rs = mysql_query($query, $this->conexion);
        }
        return $rs;
    }

    function numRows($result) {
        $num=0;
        if ($this->config->get('dbtype') == "postgres") {
            $num = pg_num_rows($result);
        } else if ($this->config->get('dbtype') == "mysql") {
            $num = mysql_num_rows($result);
        }
        return $num;
    }

    function arrayResult($result) {
        $array = null;
        if ($this->config->get('dbtype') == "postgres") {
            $array = pg_fetch_assoc($result);
        } else if ($this->config->get('dbtype') == "mysql") {
            $array = mysql_fetch_assoc($result);
        }
        return $array;
    }

    public static function singleton() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

}

?>
