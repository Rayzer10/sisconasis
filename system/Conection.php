<?php

    class Conection{

        protected $host = "localhost";
        protected $user = "root";
        protected $password = "";
        protected $dbname = "sisconasis";
        protected $db;

        public function __construct(){
           $this->db = new mysqli($this->host, $this->user, $this->password, $this->dbname);
            if ($this->db->connect_errno) {
                echo "Fallo al conectar a MySQL: (" .$this->db->connect_errno . ") " . $this->db->connect_error;
            }
        }

        public function insert($valores, $tabla){
            $column = "";
            $values = "";
            $sql = "INSERT INTO ".$tabla." (";
            foreach($valores as $columnas => $v){
                $column.= $columnas.", ";
            }
            $sql.= rtrim($column, ", ");
            $sql.= ") VALUES ("; 
            foreach($valores as $datos){
                $values.= "'".$datos."', ";
            }
            $sql.= rtrim($values, ", ");
            $sql.= ");";
            return $sql;
        }

        public function historial($accion){
            $sql = "INSERT INTO historial VAlUES ('DEFAULT', '".$accion."', '".date("Y-m-d")."', '".$_SESSION['id']."')";
            $this->db->query($sql);
        }

    }

?>