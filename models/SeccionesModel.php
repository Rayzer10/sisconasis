<?php

    class SeccionesModel extends Conection{

        Public function consulta($sql){
            return $this->db->query($sql);
        }

        public function mostrar(){
            $sql = "SELECT pba.id, a.nombre FROM anios_escolar a JOIN periescobyaniosesco pba ON (id_anioesco=a.id) INNER JOIN periodo_escolar p ON (id_perioesco=p.id) WHERE p.id = (SELECT MAX(id) FROM periodo_escolar)";
            $query = $this->db->query($sql);
            if($query->num_rows > 0 )
                return $query;
            else
                return false;
        }

        /* public function validar($id){
            $sql ="SELECT s.nombre FROM anios_escolar a JOIN periescobyaniosesco pba ON (id_anioesco=a.id) INNER JOIN periodo_escolar p ON (id_perioesco=p.id) JOIN secciones s ON (id_pba=pba.id) WHERE p.id = (SELECT MAX(id) FROM periodo_escolar) AND pba.id=$id";
            $query = $this->db->query($sql);
            if($query->num_rows > 0 )
                return $query;
            else
                return false;
        } */

        public function formulario(){
            $sql = "SELECT inicio, cierre, pba.id, a.nombre FROM anios_escolar a JOIN periescobyaniosesco pba ON (id_anioesco=a.id) INNER JOIN periodo_escolar p ON (id_perioesco=p.id) WHERE p.id = (SELECT MAX(id) FROM periodo_escolar)";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
            else
                return false;
        }

        public function agregar($anioe, $secciones){
            /* echo "SELECT pba.id, a.nombre FROM anios_escolar a JOIN periescobyaniosesco pba ON (id_anioesco=a.id) INNER JOIN periodo_escolar p ON (id_perioesco=p.id) WHERE p.id = (SELECT MAX(id) FROM periodo_escolar) AND a.nombre='$anioe'";
            $query = $this->db->query("SELECT pba.id, a.nombre FROM anios_escolar a JOIN periescobyaniosesco pba ON (id_anioesco=a.id) INNER JOIN periodo_escolar p ON (id_perioesco=p.id) WHERE p.id = (SELECT MAX(id) FROM periodo_escolar) AND a.nombre='$anioe'");
            $anioe = (object) $query->fetch_array(MYSQLI_ASSOC); */
            foreach($secciones as $secc){
                $this->db->query("INSERT INTO secciones (nombre, id_pba) VALUES ('$secc', $anioe)");
            }
            $this->historial("secciones agregadas exitosamente");
        }

        public function eliminar($id){
            $sql = "DELETE FROM secciones WHERE id='$id'";
            $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("Elimino sección");
            else
                return false;
        }

    }

?>