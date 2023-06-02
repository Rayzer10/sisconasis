<?php

class HistorialController{

    public function __construct(){
        $this->historial = new HistorialModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):

            $historial = [];

            $titulo = "Historial";
            $data = $this->historial->mostrar();
            /* var_dump($data);
            exit(); */

            if($data != false){
                while ($fila = $data->fetch_assoc()) {
                    $history = new stdClass();
                    $history->username = $fila['username'];
                    $history->accion = $fila['accion'];
                    $history->fecha = $fila['fecha'];

                    $historial[] = $history;
                }

                $data = $historial;
            }else
                $data = array();
            
            include("public/views/historial/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function reporte(){
        if(isset($_SESSION['session'])):
            $data = [];
            $data = $this->historial->mostrar();
            ($data != false ) ?  $query = $data : $query = null;
            include('public/recursos/reportes/examples/historial.php');
        else:
            header('Location:'.url_global);
        endif;
    }

}


?>