<?php 

    class RolesController{

        public function __construct(){
            $this->roles = new RolesModel;
        }

        public function index(){
            if(isset($_SESSION['session'])):
                $titulo = "Roles";
                $data = $this->roles->mostrar();
                include("public/views/roles/index.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function actualizar(){

            if(isset($_POST['agregar']))
                $data = array('agregar' => $_POST['agregar']);
            else if(isset($_POST['mostrar']))
                $data = array('mostrar' => $_POST['mostrar']);
            else if(isset($_POST['editar']))
                $data = array('editar' => $_POST['editar']);
            if(isset($_POST['reportes']))
                $data = array('reportes' => $_POST['reportes']);
            if(isset($_POST['asistencias']))
                $data = array('asistencias' => $_POST['asistencias']);
            $id = $_POST['id'];
            /* var_dump($data, $id);
            exit(); */

            $result = $this->roles->actualizar($data, $id);
            if(is_null($result))
                echo "true";
            else
                echo "false";
        }

       /*  public function formulario(){
            if(isset($_SESSION['session'])):
                $titulo = "Agregar Materia";
                include("public/views/materia/agregar.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function agregar(){
            $valores = explode(",", $_POST['valores']);
    
            $data = array(
                'codigo' => trim(strtolower($valores[0])),
                'nombre' => trim(strtolower($valores[1]))
            );
        
            $result = $this->materia->agregar($data);
            if(!$result)
                echo "Materia registrada exitosamente";
            else
                echo "Error";
        }

        public function detalles(){
            if(isset($_SESSION['session'])):
                $codigo = explode("?codigo=", paramers);
                $codigo = end($codigo);
                $titulo = "Información de la Materia";
                (!empty(base64_decode($codigo))) ? $data = $this->materia->detalles(base64_decode($codigo)) : header("location:".url_global."/materia");
                if($data != false):
                    include("public/views/materia/detalles.php");
                else:
                    header("location:".url_global."/materia");
                endif;
            else:
                header('Location:'.url_global);
            endif;
        } 

        public function editar(){
            if(isset($_SESSION['session'])):
                $codigo = explode("?codigo=", paramers);
                $codigo = end($codigo);
                $titulo = "Editar Materia";
                (!empty(base64_decode($codigo))) ? $data = $this->materia->detalles(base64_decode($codigo)) : header("location:".url_global."/materia");
                if($data != false):
                    include("public/views/materia/editar.php");
                else:
                    header("location:".url_global."/materia");
                endif;
            else:
                header('location:'.url_global);
            endif;
        }
        
        */


    }


?>