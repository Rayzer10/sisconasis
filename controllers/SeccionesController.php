<?php
    class SeccionesController{
        public function __construct(){
            $this->secciones = new SeccionesModel;
        }
            
        public function index(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] != 3):
            $d = "";
            $titulo = "Lista Secciones";
            $data = $this->secciones->mostrar();
            include("public/views/secciones/index.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function formulario(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] != 3):
                $titulo = "Agregar Nueva Sección";
                (isset($_POST['id'])) ? $id = $_POST['id'] : $id = "";
                $data = $this->secciones->formulario();
                $p_escolar = (object) $data->fetch_array(MYSQLI_ASSOC);
                /* if(isset($_POST['id']))
                $validar = $this->secciones->validar($id); */
                include("public/views/secciones/agregar.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function agregar(){
            $anioe = trim($_POST['aescolar']);
            $secciones = $_POST['secciones'];
            $result = $this->secciones->agregar($anioe, $secciones);
            if(!$result)
                echo "Datos registrado exitosamente";
            else
                echo "Error";
        }

        public function eliminar(){
            $id = $_POST['id'];
            $result = $this->secciones->eliminar($id);
            if(!$result)
                echo "true";
            else
                echo "false";
        }

        public function disposecciones(){
            $id = $_POST['id'];
            $data = [];
            $query = $this->secciones->consulta("SELECT nombre FROM periescobyaniosesco pba JOIN secciones ON (pba.id=id_pba) WHERE id_pba = $id;
            ");
            foreach($query as $rows){
                $data[] = $rows;
            }
            echo json_encode($data);
        }

    }


?>