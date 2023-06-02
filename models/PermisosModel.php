<?php

    class PermisosModel extends Conection{

        public function mostrar($data){
            $data['items'] = array(); // Inicializa el array 'item'

            if($data['filtro'] == 1)
                $sql = "SELECT ci, nombre, apellido, DATE_FORMAT(pe.fecha_inicio, '%d-%m-%Y') AS inicio, DATE_FORMAT(pe.fecha_fin, '%d-%m-%Y') AS fin, pe.motivo, (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) AS 'estado' FROM permisos pe INNER JOIN personal p ON (cedula=ci) WHERE (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) = 1 ORDER BY nombre";
            else
                $sql = "SELECT ci, nombre, apellido, DATE_FORMAT(pe.fecha_inicio, '%d-%m-%Y') AS inicio, DATE_FORMAT(pe.fecha_fin, '%d-%m-%Y') AS fin, pe.motivo, (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) AS 'estado' FROM permisos pe INNER JOIN personal p ON (cedula=ci) WHERE (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin) = 0 ORDER BY nombre";

            $query = $this->db->query($sql);
            
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
                    $data['items'][] = $row; // Agrega cada fila al array 'items'
                }
            } else {
                $data['error'] = false; // No hay registros, establece 'error' a false
            }
            
            echo json_encode($data);
            
        }

        public function cedula(){
            $sql = "SELECT DISTINCT p.* FROM personal p INNER JOIN asignacion a ON (ci=cedula_personal) WHERE (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin)<1 ORDER BY nombre";
            $query = $this->db->query($sql);
            if($query->num_rows > 0 )
                return $query;
            else
                return false;
        }

        public function agregar($datos){
            /* $this->historial("agregó un nueva persona - cédula ".$datos['ci'].""); */
            $sql = $this->insert($datos, "permisos");
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                return true;
            else
                return false;
        }

    }

?>