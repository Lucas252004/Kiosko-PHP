<?php
session_start();
require_once('../Model/Conexion.php');
$con = new Conexion();
if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $pass = md5($pass);
    if(empty($uname)){
        header("Location: http://localhost/proyecto_php/Views/iniciar_sesion_admin.php");
        exit();
    }else if(empty($pass)){
        header("Location: http://localhost/proyecto_php/Views/iniciar_sesion_admin.php");
        exit();
    }else{
        $result = $con->verficarAdmin($uname, $pass);
        
        if(empty($result)){
            header("Location: http://localhost/proyecto_php/Views/iniciar_sesion_admin.php");
            exit();
        }else{
            foreach($result as $row){
                $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['id_admin'] = $row['id_admin'];
                header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
                exit();
            }
        }
    }
}else{
    header("Location: http://localhost/proyecto_php/Views/iniciar_sesion_admin.php");
    exit();
}
require_once('../Views/iniciar_sesion_admin.php');
?>