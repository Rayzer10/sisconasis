<?php

    class UsuariosModel extends Conection{

        public function mostrar(){
            $sql = "SELECT * FROM personal p JOIN usuarios u ON (p.ci=u.ci) JOIN usuariobyrole ubr ON (ubr.id_usuario=u.id) JOIN roles r ON (ubr.id_role=r.id) ORDER BY nombre";
            $query = $this->db->query($sql);
            /* $result = $query->fetch_array(MYSQLI_ASSOC);*/
            return $query;
        }

        public function consulta(){
            $sql = "SELECT nombre, apellido, p.ci FROM personal p WHERE (SELECT COUNT(*) FROM usuarios u WHERE u.ci=p.ci)<1";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
        }

        public function agregar($datos, $role){
            $sql = $this->insert($datos, "usuarios");
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0){
                $query = $this->db->query("SELECT MAX(id) as id FROM usuarios");
                $usu = (object) $query->fetch_array(MYSQLI_ASSOC);
                $rol = array("id_role" => $role, "id_usuario" => $usu->id);
                $sql = $this->insert($rol, "usuariobyrole");
                $send = $this->db->query($sql);
                if($this->db->affected_rows > 0)
                    $this->historial("agregó al usuario - ".$datos['username']);
            }
            else
                return false;
        }

        public function perfil($ci){
            $sql = "SELECT nombre, apellido, u.ci, username, r.id AS id_rol, rol, u.estado, u.id AS id_usu FROM personal p JOIN usuarios u ON (p.ci=u.ci) JOIN usuariobyrole ubr ON (ubr.id_usuario=u.id) JOIN roles r ON (ubr.id_role=r.id) WHERE u.ci=$ci";
            $query = $this->db->query($sql);
            if($query->num_rows > 0){
                $result = $query->fetch_array(MYSQLI_ASSOC);
                return (object) $result;
            }else
                return false;
        }

        public function actualizar($data, $cedula, $rol){
            $sql = "UPDATE usuarios set ";
            foreach($data as $columns => $valores){
                $sql.= $columns."='".$valores."', ";
            }
            $sql = rtrim($sql, ", ");
            $sql.= " WHERE ci=$cedula";
         
            $query = $this->db->query($sql);

            $sql2 = "UPDATE usuariobyrole set id_role=$rol[0] WHERE id_usuario=$rol[1]";
            $query2 = $this->db->query($sql2);

            if($this->db->affected_rows > 0)
                $this->historial("actualizó datos de usuario - ".$data['username']);
            else
                return false;
        }

        public function estado($ci, $estado){
            $sql = "SELECT username FROM usuarios WHERE ci=$ci"; 
            $query = $this->db->query($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);

            $sql = "UPDATE usuarios SET estado=$estado WHERE ci=$ci";
            $this->db->query($sql);

            if($this->db->affected_rows > 0)
                $this->historial("cambió el estado de usuario - ".$row['username']);
            else
                return false;
        }

    }

?>