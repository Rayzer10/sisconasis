<?php

    include ('models/AsistenciasModel.php');

    class ReportesController{

        public function __construct(){
            $this->reportes = new AsistenciasModel;
        }

        public function index(){
            if(isset($_SESSION['session']) && $_SESSION['rol'] != 3):
                $titulo = "Reportes";
                include("public/views/reportes/index.php");
            else:
                header('Location:'.url_global);
            endif;
        }

        public function asistencias(){
            if(isset($_SESSION['session'])):
                $data = [];
                $sql = "SELECT cedula, nombre, apellido, COUNT(*) AS 'asistencia', fecha FROM personal p INNER JOIN asistencias a ON(cedula=ci) GROUP BY cedula ORDER BY nombre";
                $query = $this->reportes->consulta($sql);
                ($query->num_rows > 0 ) ?  $query = $query : $query = null;
                include('public/recursos/reportes/examples/asistencias.php');
            else:
                header('Location:'.url_global);
            endif;
        }

        public function vigentes(){
            if(isset($_SESSION['session'])):
                $data = [];
                $sql = "SELECT ci, nombre, apellido, DATE_FORMAT(pe.fecha_inicio, '%d-%m-%Y') AS inicio, DATE_FORMAT(pe.fecha_fin, '%d-%m-%Y') AS fin, pe.motivo, (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) AS 'estado' FROM permisos pe INNER JOIN personal p ON (cedula=ci) WHERE (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) = 1 ORDER BY inicio DESC, fin DESC";
                $query = $this->reportes->consulta($sql);
                ($query->num_rows > 0 ) ?  $query = $query : $query = null;
                include('public/recursos/reportes/examples/vigentes.php');
            else:
                header('Location:'.url_global);
            endif;
        }

        public function vencidos(){
            if(isset($_SESSION['session'])):
                $data = [];
                $sql = "SELECT ci, nombre, apellido, DATE_FORMAT(pe.fecha_inicio, '%d-%m-%Y') AS inicio, DATE_FORMAT(pe.fecha_fin, '%d-%m-%Y') AS fin, pe.motivo, (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) AS 'estado' FROM permisos pe INNER JOIN personal p ON (cedula=ci) WHERE (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) = 0 ORDER BY inicio DESC, fin DESC";
                $query = $this->reportes->consulta($sql);
                ($query->num_rows > 0 ) ?  $query = $query : $query = null;
                include('public/recursos/reportes/examples/vencidos.php');
            else:
                header('Location:'.url_global);
            endif;
        }

        public function personal(){
            if(isset($_SESSION['session'])):
                $data = [];
                $sql = "SELECT * FROM personal ORDER BY nombre";
                $query = $this->reportes->consulta($sql);
                ($query->num_rows > 0 ) ?  $query = $query : $query = null;
                include('public/recursos/reportes/examples/personal.php');
            else:
                header('Location:'.url_global);
            endif;
        }

   }

?>