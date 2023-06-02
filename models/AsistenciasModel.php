<?php

    class AsistenciasModel extends Conection{

        Public function consulta($sql){
            return $this->db->query($sql);
        }

        public function date(){
            $data = [];
            $sql = "SELECT fecha AS fecha_min, (SELECT fecha FROM asistencias GROUP BY fecha DESC limit 1) AS fecha_max FROM asistencias GROUP BY fecha limit 1";
            $query = $this->db->query($sql);
            if($query->num_rows>0){
                while($rows = $query->fetch_array(MYSQLI_ASSOC)){
                    $data['items'][]= $rows;
                }
            }
            else
                $data['error'] = false;

            echo json_encode($data);
        }

        public function listaasis($fecha){
            $data = [];
            $sql = "SELECT cedula, nombre, apellido, COUNT(*) AS 'asistencia' FROM personal p INNER JOIN asistencias a ON(cedula=ci) WHERE fecha = '{$fecha}' GROUP BY cedula ORDER BY nombre";
            $query = $this->db->query($sql);
            if($query->num_rows>0){
                while($rows = $query->fetch_array(MYSQLI_ASSOC)){
                    $data['items'][]= $rows;
                }
            }
            else
                $data['error'] = false;
                
            echo json_encode($data);
        }

       /*  public function mostrar(){
            $sql = "SELECT cedula, nombre, apellido, COUNT(*) AS 'asistencia' FROM personal p INNER JOIN asistencias a ON(cedula=ci) WHERE fecha = '".date("Y-m-d")."' GROUP BY cedula ORDER BY nombre";
            $query = $this->db->query($sql);
            if($query->num_rows>0)
                return $query;
            else
                return false;
        } */

        public function cedula(){
            $sql = "SELECT DISTINCT p.* FROM personal p INNER JOIN asignacion a ON (ci=cedula_personal) WHERE (SELECT COUNT(*) FROM asistencias WHERE cedula=p.ci AND fecha = '".date("Y-m-d")."') < 2 AND (SELECT COUNT(*) FROM permisos WHERE cedula=p.ci AND CURDATE() BETWEEN fecha_inicio AND fecha_fin)<1 ORDER BY nombre";
            $query = $this->db->query($sql);
            if($query->num_rows > 0)
                return $query;
            else
                return false;
        }

        public function getInfo($ci){
            $data = [];
            $sql = "SELECT * FROM asistencias WHERE cedula = $ci AND fecha = '".date("Y-m-d")."'";
            $cont = $this->db->query($sql);
            if($cont->num_rows < 1)
                $sql = "SELECT DISTINCT ci, abreviacion, horario_entrada, (SELECT COUNT(*) FROM asistencias WHERE cedula=p.ci AND fecha = '".date("Y-m-d")."') AS 'count' FROM personal p INNER JOIN asignacion a ON (ci=cedula_personal) INNER JOIN diasemanas d ON (d.id=id_dias) WHERE ci = $ci AND abreviacion = '".strtolower(date("D"))."' ORDER BY horario_entrada LIMIT 1";
            else
                $sql = "SELECT DISTINCT ci, abreviacion, horario_salida, (SELECT COUNT(*) FROM asistencias WHERE cedula=p.ci AND fecha = '".date("Y-m-d")."') AS 'count' FROM personal p INNER JOIN asignacion a ON (ci=cedula_personal) INNER JOIN diasemanas d ON (d.id=id_dias) WHERE ci = $ci AND abreviacion = '".strtolower(date("D"))."' ORDER BY horario_salida DESC LIMIT 1";
        
            $query = $this->db->query($sql);
            $row = $query->fetch_array(MYSQLI_ASSOC);
            $data['items'] = array($row);
            
            echo json_encode($data);
        }

        public function marcar($datos){
            /* $this->historial("agregó un nueva persona - cédula ".$datos['ci'].""); */
            $sql = $this->insert($datos, "asistencias");
            $query = $this->db->query($sql);
            if($this->db->affected_rows > 0)
                return true;
            else
                return false;
        }

    }

?>