<?php

    class LoginModel extends Conection{

        public function login($user, $pass){
            $sql = "SELECT u.id as id_usuario, r.id as id_rol, u.*, p.*, r.* FROM personal p JOIN usuarios u ON (p.ci=u.ci) JOIN usuariobyrole ubr ON (ubr.id_usuario=u.id) JOIN roles r ON (ubr.id_role=r.id) WHERE username='".$user."' AND u.estado=1";
            $query = $this->db->query($sql);
            if($query->num_rows == 1){
                $result = (object) $query->fetch_array(MYSQLI_ASSOC);
                if($result->password == md5($pass)){
                    $_SESSION['username'] = $result->username;
                    $_SESSION['id'] = $result->id_usuario;
                    $_SESSION['ci'] = $result->ci;
                    $_SESSION['nombre'] = ucfirst(strtolower($result->nombre))." ".ucfirst(strtolower($result->apellido));
                    $_SESSION['rol'] = $result->id_rol;
                    $_SESSION['agregar'] = $result->agregar;
                    $_SESSION['mostrar'] = $result->mostrar;
                    $_SESSION['editar'] = $result->editar;
                    $_SESSION['reportes'] = $result->reportes;
                    $_SESSION['asistencias'] = $result->asistencias;
                    $_SESSION['session'] = true;
                    echo "true";
                }else{
                    echo "La contraseña no coincide";
                }
            }else
                echo "El nombre de usuario no existe";
        }

    }

?>

