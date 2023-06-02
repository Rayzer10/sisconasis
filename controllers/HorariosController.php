<?php
    include("models/UsuariosModel.php");
    include("models/SeccionesModel.php");
    class HorariosController{

        public function __construct(){
            $this->horarios = new HorariosModel;
            $this->personal = new PersonalModel;
            $this->secciones = new SeccionesModel;
        }

        public function index(){
            if(isset($_SESSION['session'])):
                $titulo = "Horarios";
                $doce = $this->horarios->docehorarios();
                include("public/views/horarios/index.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function listahorario(){
            if(isset($_SESSION['session'])):
                $ci = $_POST['ci'];
                $id = $_POST['id'];
                $dia = $_POST['dia'];
                $data = $this->horarios->mostrar($ci, $id, $dia);
                $anio = (object) $data->fetch_array(MYSQLI_ASSOC);
                include('public/views/horarios/listahorarios.php');
            else:
                header('Location:'.url_global);
            endif;
        }

        public function formulario(){
            if(isset($_SESSION['session'])):
                $titulo = "Asignar Horario";
                $data = $this->personal->mostrar();
                $secc = $this->horarios->allseccion();
                $aniose = $this->secciones->formulario();
                $diase = $this->horarios->diasemanas();
                $p_escolar = (object) $aniose->fetch_array(MYSQLI_ASSOC);
                include("public/views/horarios/agregar.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function agregar(){
             $data = array(
                "cedula_personal" => trim($_POST['ci_personal']),
                "id_seccion" => trim($_POST['seccion']),
                "id_dias" => trim($_POST['diasemanas']),
                "horario_entrada" => trim($_POST['entrada']),
                "horario_salida" => trim($_POST['salida'])
             );

             $result = $this->horarios->agregar($data);
             if($result!=false)
                header('location:'.url_global."/horarios/formulario");
            else
                echo "Error";
        }

        public function editar(){
            if(isset($_SESSION['session'])):
                $id = explode("id=", paramers);
                $id = end($id);
                $secc = $this->horarios->allseccion();
                $diase = $this->horarios->diasemanas();
                $aniose = $this->secciones->formulario();
                $p_escolar = (object) $aniose->fetch_array(MYSQLI_ASSOC);
                $titulo = "Editar Horario";
                (!empty(base64_decode($id))) ? $data = $this->horarios->editar(base64_decode($id)) : header("location:".url_global."/horarios");
                if($data != false):
                    include("public/views/horarios/editar.php"); 
                else:
                    header("location:".url_global."/horarios");
                endif;
            else:
                header('location:'.url_global);
            endif;
        }

        public function actualizar(){
            $data = array(
               "id_seccion" => isset($_POST['seccion']) ? trim($_POST['seccion']) : null,
               "id_dias" => isset($_POST['diasemanas']) ? trim($_POST['diasemanas']) : null,
               "horario_entrada" => trim($_POST['entrada']),
               "horario_salida" => trim($_POST['salida'])
            );

            $data = array_filter($data);
            $id = $_POST['id_hidden'];

            $result = $this->horarios->actualizar($data, $id);
            if(is_null($result))
               header('location:'.url_global."/horarios/editar?id=".$_POST['id_url']);
           else
               echo "Error";
       }

        public function anios_ci(){
            /* SELECT id_seccion, a.id_dias, ae.nombre, s.nombre FROM personal p JOIN asignacion a ON (cedula_personal=ci) JOIN secciones s ON (id_seccion=s.id) JOIN periescobyaniosesco pba ON (pba.id=id_pba) JOIN anios_escolar ae ON (id_anioesco=ae.id) WHERE ci = 26896589 GROUP by s.nombre */
            $data = [];
            $query = $this->horarios->consulta("SELECT id_pba, ae.nombre AS 'anios' FROM personal p JOIN asignacion a ON (cedula_personal=ci) JOIN secciones s ON (id_seccion=s.id) JOIN periescobyaniosesco pba ON (pba.id=id_pba) JOIN anios_escolar ae ON (id_anioesco=ae.id) WHERE ci = {$_POST['ci']} GROUP BY id_pba ");
            while($rows = $query->fetch_array(MYSQLI_ASSOC)){
                $data[] = $rows;
            }
            echo json_encode($data);
        }

        public function anio_dias(){
            $data = [];
            $query = $this->horarios->consulta("SELECT DISTINCT d.id, dias FROM diasemanas d JOIN asignacion a ON d.id = a.id_dias JOIN secciones s ON a.id_seccion = s.id WHERE cedula_personal = {$_POST['ci']} AND id_pba = {$_POST['id']} GROUP BY dias ORDER BY d.id");
            while($rows = $query->fetch_array(MYSQLI_ASSOC)){
                $data[] = $rows;
            }
            echo json_encode($data);
        }

    }

?>