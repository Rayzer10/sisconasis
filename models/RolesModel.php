<?php 

    class RolesModel extends Conection{

        public function mostrar(){
            $sql = "SELECT * FROM roles ORDER BY id";
            $query = $this->db->query($sql);
            /* $result = $query->fetch_array(MYSQLI_ASSOC);*/
            return $query;
        }

        /* public function agregar($datos){
            $sql = $this->insert($datos, "materia");
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("agregó una materia - código: ".$datos['codigo']);
            else
                return false;
        }

        public function detalles($codigo){
            $sql = "SELECT * FROM materia WHERE codigo='$codigo'";
            $query = $this->db->query($sql);
            if($query->num_rows > 0){
                $result = $query->fetch_array(MYSQLI_ASSOC);
                return (object) $result;
            }else
                return false;
        } */

        public function actualizar($datos, $id){
            $sql = "UPDATE roles set ";
            foreach($datos as $columns => $valores){
                $sql.= $columns."='".$valores."', ";
            }
            $sql = rtrim($sql, ", ");
            $sql.= "WHERE id='$id'";
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                $this->historial("actualización de los roles");
            else
                return false;
        }

    }


?>