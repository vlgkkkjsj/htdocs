<?php

  /*  define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('BASE', 'dbcadastro');

    $conn1 = new mysqli(HOST,USER,PASS,BASE); */

    class conexao
    {   
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $base  = "dbcadastro";
        private $conn1;

        public function __construct()
        {
            $this->conn1 = mysqli_connect($this->host, $this->user , $this->pass) or die ("Conexao com o banco ".mysqli_error($this->conn1));

            mysqli_select_db($this->conn1,$this->base)or die ("erro ao conectar ".mysqli_error($this->conn1));

        }
        public function getConn()
        {
            return $this->conn1;
        }   
    }