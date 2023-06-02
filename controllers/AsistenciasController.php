<?php

    class AsistenciasController{

        public function __construct(){
            $this->asistencia = new AsistenciasModel;
        }

        public function fechas(){
            $this->asistencia->date();
        }

        public function filtro(){
            $fecha = $_POST['fecha'];
            $this->asistencia->listaasis($fecha);
        }


        public function index(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['asistencias'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['asistencias'] == 1)):
                $titulo = "Lista de Asistencias";
               /*  $data = $this->asistencia->mostrar();
                ($data == false) ? $data = [] : $data = $data; */
                include("public/views/asistencias/index.php");
            else:
                header('location:'.url_global);
            endif;
        }

        public function formulario(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['asistencias'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['asistencias'] == 1)):
                $titulo = "Asistencia";
                $data = $this->asistencia->cedula();
                include("public/views/asistencias/agregar.php");
            else:
                header('location:'.url_global);
            endif;
        }

        public function asisinfo(){
            $ci = $_POST['cedula'];
            $data = $this->asistencia->getInfo($ci);
        }

        public function agregar(){
            $data = array(
                "cedula" => $_POST['ci_personal'],
                "hora" => $_POST['hora'],
                "fecha" => date("Y-m-d")
            );

            $result = $this->asistencia->marcar($data);
            if($result == true)
                echo "Asistencia Marcada";
            else
                echo "Error";

        }

    }

?>