<?php

    class HistorialModel extends Conection{

        public function mostrar(){
           ($_SESSION['rol'] == 1) ? $where = "" : $where = "WHERE u.ci=".$_SESSION['ci']."";
            $sql = "SELECT  accion, u.*, DATE_FORMAT(fecha, '%d-%m-%Y') AS 'fecha' FROM historial h INNER JOIN usuarios u on (id_usuario=u.id) JOIN personal p ON (u.ci=p.ci) $where ORDER BY h.id DESC ";
            $query = $this->db->query($sql);
            /* $result = $query->fetch_array(MYSQLI_ASSOC);*/
            if($query->num_rows > 0 )
                return $query;
            else
                return false;
        }

    }

?>