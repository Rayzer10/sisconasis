<?php

class HomeController{
    /* public function __construct(){
        $this->login = new LoginModel;
    } */
        
    public function index(){
        if(isset($_SESSION['session'])):
            $titulo = "Home";
            /* $sql = "SELECT * FROM comentarios"; 
            $result = $this->db->query($sql);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo "Inicio Sesión ".$row['usuario']; */
            include("public/views/home/index.php");
        else:
            header('Location:'.url_global);
        endif;
    }

}

?>