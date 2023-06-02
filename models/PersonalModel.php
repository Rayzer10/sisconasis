<?php

    class PersonalModel extends Conection{

        public function mostrar(){
            $sql = "SELECT * FROM personal ORDER BY nombre";
            $query = $this->db->query($sql);
            /* $result = $query->fetch_array(MYSQLI_ASSOC);*/
            return $query;
        }

        public function agregar($datos){
            $sql = $this->insert($datos, "personal");
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("agregó un nueva persona - cédula ".$datos['ci']."");
            else
                return false;
        }

        public function perfil($ci){
            $sql = "SELECT * FROM personal WHERE ci=$ci";
            $query = $this->db->query($sql);
            if($query->num_rows > 0){
                $result = $query->fetch_array(MYSQLI_ASSOC);
                return (object) $result;
            }else
                return false;
        }

        public function actualizar($data, $cedula){
            $sql = "UPDATE personal set ";
            foreach($data as $columns => $valores){
                $sql.= $columns."='".$valores."', ";
            }
            $sql = rtrim($sql, ", ");
            $sql.= " WHERE ci=$cedula";
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("actualizó los datos de la persona - cédula $cedula");
            else
                return false;
        }

        public function estado($ci, $estado){
            $sql = "UPDATE personal SET estado=$estado WHERE ci=$ci";
            $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("cambió el estado de la persona - cédula $ci");
            else
                return false;
        }

    }
?>