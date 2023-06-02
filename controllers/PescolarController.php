<?php

    class PescolarController{

        public function __construct(){
            $this->pescolar = new PescolarModel;
        }

        public function index(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] != 3):
                $titulo = "Periodo Escolar";
                $data = $this->pescolar->mostrar();
                include("public/views/periodo_escolar/editar.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function actualizar(){
            $data = array(
                "inicio" => date('Y-m-d', strtotime($_POST['fechai'])),
                "cierre" => date('Y-m-d', strtotime($_POST['fechac'])),
                "id_usuario" => $_SESSION['id']
            );
            $result = $this->pescolar->actualizar($data);
            if(!$result)
                echo "Datos actualizado exitosamente";
            else
                echo "Error";
        }

    }

?>