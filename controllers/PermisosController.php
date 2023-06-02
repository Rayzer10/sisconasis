<?php

    class PermisosController{

        public function __construct(){
            $this->permisos = new PermisosModel;
        }

        public function index(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['asistencias'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['asistencias'] == 1)):
                $titulo = "Permisos";
                /* $data = $this->permisos->mostrar();
                ($data == false) ? $data = array() : $data = $data; */
                include("public/views/permisos/index.php");
            else:
                header('location:'.url_global);
            endif;
        }

        public function filtro(){
            $data = array("filtro" => $_POST['filtro']); 
            $this->permisos->mostrar($data);
        }

        public function formulario(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] == 1 || ($_SESSION['rol'] == 2 && $_SESSION['agregar'] == 1) || ($_SESSION['rol'] == 3 && $_SESSION['agregar'] == 1)):
                $titulo = "Agregar Permiso";
                $data = $this->permisos->cedula();
                include("public/views/permisos/agregar.php");
            else:
                header('location:'.url_global);
            endif;
        }

        public function agregar(){
            $data = array(
                'cedula' => $_POST['ci_personal'],
                'fecha_inicio' => date('Y-m-d', strtotime($_POST['fecha_inicio'])),
                'fecha_fin' => date('Y-m-d', strtotime($_POST['fecha_fin'])),
                'motivo' => trim($_POST['motivo'])
            );
            $result = $this->permisos->agregar($data);
            if($result == true)
                echo "Permiso agregado exitosamente";
            else
                echo "Error";
        }

    }

?>