<?php

    class PescolarModel extends Conection{

        public function mostrar(){
            $sql = "SELECT DATE_FORMAT(inicio, '%d-%m-%Y') AS 'inicio', DATE_FORMAT(cierre, '%d-%m-%Y') AS 'cierre' FROM periodo_escolar ORDER BY id DESC";
            $query = $this->db->query($sql);
            if($query->num_rows > 0 )
                return (object) $query->fetch_array(MYSQLI_ASSOC);
            else
                return false;
        }

        public function actualizar($data){
           
            $sql = $this->insert($data, "periodo_escolar");
            $insert = $this->db->query($sql);
            if($this->db->affected_rows > 0){
                $pescolar = $this->mostrar();
                $sql = "SELECT * FROM anios_escolar ORDER BY id";
                $query = $this->db->query($sql);
                while($rows = $query->fetch_array(MYSQLI_ASSOC)){
                    $this->db->query("INSERT INTO periescobyaniosesco SET id_perioesco= '$pescolar->id', id_anioesco='".$rows['id']."'");
                }
                $this->historial("periodo escolar actualizado");
            }
        }

    }

?>