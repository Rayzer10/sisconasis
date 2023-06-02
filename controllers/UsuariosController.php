<?php

include("models/RolesModel.php");

class UsuariosController{

    public function __construct(){
        $this->usuarios = new UsuariosModel;
        $this->roles = new RolesModel;
    }
        
    public function index(){
        if($_SESSION['rol'] == 3):
            header('location:'.url_global.'/historial');
        else:
            if(isset($_SESSION['session']) && ($_SESSION['rol'] != 3 )):
                $titulo = "Lista de Usuarios";
                $data = $this->usuarios->mostrar();
                include("public/views/usuarios/index.php");
            else:
                header('Location:'.url_global);
            endif;
        endif;
    }

    public function formulario(){
        if(isset($_SESSION['session']) && ($_SESSION['rol'] != 3 )):
            $titulo = "Agregar Nuevo Usuario";
            $data = $this->usuarios->consulta();
            $roles = $this->roles->mostrar();
            include("public/views/usuarios/agregar.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function agregar(){
        $data = array(
            'ci' => trim($_POST['ci_personal']),
            'username' => trim($_POST['username']),
            'password' => md5($_POST['password']),
        );

        $role = $_POST['rol'];
    
        $result = $this->usuarios->agregar($data, $role);
        if(!$result)
            echo "Usuario registrado exitosamente";
        else
            echo "Error";
    }

    public function perfil(){
            $ci = explode("?ci=", paramers);
        if(isset($_SESSION['session']) && ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2 || ($_SESSION['rol'] == 3 && base64_decode(urldecode($ci[1])) == $_SESSION['ci']))):
            $titulo = "Perfil Usuario";
            (!empty(base64_decode(urldecode($ci[1])))) ? $data = $this->usuarios->perfil(base64_decode(urldecode($ci[1]))) : header("location:".url_global."/usuarios");
            if($data != false):
                include("public/views/usuarios/perfil.php");
            else:
                header("location:".url_global."/usuarios");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function editar(){
        if(isset($_SESSION['session']) && ($_SESSION['rol'] != 3 )):
            $ci = explode("?ci=", paramers);
            $ci = end($ci);
            $ci = urldecode($ci);
            $titulo = "Editar Usuario";
            if(!empty(base64_decode(urldecode($ci)))){
                $data = $this->usuarios->perfil(base64_decode(urldecode($ci)));
                $roles = $this->roles->mostrar();
            }else
                header("location:".url_global."/usuarios");
            if($data != false):
                include("public/views/usuarios/editar.php");
            else:
                header("location:".url_global."/usuarios");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function actualizar(){
        $data = array(
            'username' => trim($_POST['username'])
        );

        if(!empty($_POST['password']))
            $data['password'] = md5($_POST['password']);

        $rol = $_POST['rol'];
        $cedula = $_POST['ci_hidden'];

        /* var_dump($data, $rol, $cedula);
        exit(); */
        $result = $this->usuarios->actualizar($data, $cedula, $rol);

        if(!$result)
            echo "Datos del usuario actualizado exitosamente";
        else
            echo "Error";
    }

    public function estado(){
        $estado = $_POST['estado'];
        $ci = $_POST['ci'];

        ($estado == 1) ? $estado = 0 : $estado = 1;
        $result = $this->usuarios->estado($ci, $estado);
    
        if(!$result)
            echo "true";
        else
            echo "false";
    }

}

?>