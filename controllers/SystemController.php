<?php

    include('models/AsistenciasModel.php');

    class SystemController{

        public function __construct(){
            $this->system = new AsistenciasModel;
        }

        public function unique(){
            $boolean = [];
            $sql = "SELECT * FROM {$_POST['tabla']} WHERE {$_POST['campo']} = '{$_POST['dato']}'";
            $verify = $this->system->consulta($sql);
            if($verify->num_rows == 1)
                $boolean['verify'] = true;
            else
                $boolean['verify'] = false;
            echo json_encode($boolean);
        }
    }

?>