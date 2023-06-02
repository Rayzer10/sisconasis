<?php

class PersonalController{

    public function __construct(){
        $this->personal = new PersonalModel;
    }
        
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Lista de Personas";
            $data = $this->personal->mostrar();
            include("public/views/personal/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function formulario(){
        if(isset($_SESSION['session'])):
            $titulo = "Agregar Nueva Persona";
            include("public/views/personal/agregar.php");
        else:
            header('Location:'.url_global);
        endif;
    }

    public function agregar(){
        $data = array(
            'ci' => trim($_POST['ci']),
            'nombre' => trim($_POST['nombre']),
            'apellido' => trim($_POST['apellido']),
            'correo' => trim($_POST['correo']),
            'telefono' => trim($_POST['telefono']),
            'horas_totales' => trim($_POST['horas_totales']),
            'grado_instruccional' => trim($_POST['grado_instruccional'])
        );

        $result = $this->personal->agregar($data);
        if(!$result)
            echo "Persona registrada exitosamente";
        else
            echo "Error";
    }

    public function perfil(){
        if(isset($_SESSION['session'])):
            $ci = explode("?ci=", paramers);
            $titulo = "Perfil";
            (!empty(base64_decode(urldecode($ci[1])))) ? $data = $this->personal->perfil(base64_decode(urldecode($ci[1]))) : header("location:".url_global."/personal");
            if($data != false):
                include("public/views/personal/perfil.php");
            else:
                header("location:".url_global."/personal");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function editar(){
        if(isset($_SESSION['session'])):
            $ci = explode("?ci=", paramers);
            $ci = end($ci);
            $ci = urldecode($ci);
            $titulo = "Editar Persona";
            (!empty(base64_decode(urldecode($ci)))) ? $data = $this->personal->perfil(base64_decode(urldecode($ci))) : header("location:".url_global."/personal");
            if($data != false):
                include("public/views/personal/editar.php");
            else:
                header("location:".url_global."/personal");
            endif;
        else:
            header('Location:'.url_global);
        endif;
    }

    public function actualizar(){
        $data = array(
            'ci' => trim($_POST['ci']),
            'nombre' => trim($_POST['nombre']),
            'apellido' => trim($_POST['apellido']),
            'correo' => trim($_POST['correo']),
            'telefono' => trim($_POST['telefono']),
            'horas_totales' => trim($_POST['horas_totales']),
            'grado_instruccional' => trim($_POST['grado_instruccional'])
        );
        $cedula = $_POST['ci_hidden'];
        $result = $this->personal->actualizar($data, $cedula);
        if(!$result)
            echo "Datos actualizado exitosamente";
        else
            echo "Error";
    }

    public function estado(){
        $estado = $_POST['estado'];
        $ci = $_POST['ci'];
        ($estado == 1) ? $estado = 0 : $estado = 1;
        $result = $this->personal->estado($ci, $estado);
        if(!$result)
            echo "true";
        else
            echo "false";

    }

}

?>