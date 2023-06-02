<?php

    class HorariosModel extends Conection{

        Public function consulta($sql){
            return $this->db->query($sql);
        }

        public function mostrar($ci, $id, $dia){
            $sql = "SELECT a.nombre, dias, horario_entrada AS entrada, horario_salida AS salida, id_seccion, ag.id FROM anios_escolar a JOIN periescobyaniosesco pba ON (id_anioesco=a.id) INNER JOIN periodo_escolar p ON (id_perioesco=p.id) JOIN secciones s ON (pba.id=id_pba) JOIN asignacion ag ON (id_seccion = s.id) JOIN diasemanas ds ON (id_dias=ds.id) WHERE cedula_personal=$ci AND id_dias=$dia AND pba.id=$id AND p.id = (SELECT MAX(id) FROM periodo_escolar) ORDER BY ds.id";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
            else
                return false;
        }

        public function agregar($data){
            $sql = $this->insert($data, "asignacion");
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                return true;
            else
                return false;
        }

        public function editar($id){
            $sql = "SELECT nombre, apellido, a.* FROM asignacion a JOIN personal ON (ci=cedula_personal) WHERE id=$id";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return (object) $query->fetch_array(MYSQLI_ASSOC);
            else
                return false;
        }

        public function actualizar($data, $id){
            $sql = "UPDATE asignacion set ";
            foreach($data as $columns => $valores){
                $sql.= $columns."='".$valores."', ";
            }
            $sql = rtrim($sql, ", ");
            $sql.= " WHERE id=$id";
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("actualizó un horario");
            else
                return false;
        }

        public function docehorarios(){
            $sql = "SELECT DISTINCT ci, nombre, apellido FROM personal JOIN asignacion ON (ci=cedula_personal) ORDER BY nombre";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
            else
                return false;
        }

        public function diasemanas(){
            $sql = "SELECT * FROM diasemanas GROUP BY dias ORDER BY id";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
            else
                return false;
        }

        public function allseccion(){
            $sql = "SELECT s.id, ae.nombre, s.nombre AS nombre_s FROM secciones s JOIN periescobyaniosesco pba ON (id_pba=pba.id) JOIN anios_escolar ae ON (ae.id=id_anioesco)";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
            else
                return false;
        }


    }

?>