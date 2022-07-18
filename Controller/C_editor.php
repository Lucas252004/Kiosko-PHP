<?php
//Llamo al archivo Conexion.php
require_once('../Model/Conexion.php');
$con = new Conexion();
//Diseño de colores de la Pagina
if(isset($_POST['cambiar_color'])){

    $color = $_POST['colorlista'];
    $con->insertarColores($color);
}
//Diseño de colores de la Pagina
if(isset($_POST['cambiar_color_menu'])){

    $color = $_POST['colorlista_menu'];
    $con->insertarColoresMenu($color);
}
$color_actual = $con->getColorActual();
//-----------COLOR ACTUAL DEL MENU------------------
$color_actual_menu = $con->getColorMenuActual();
//----------ENCABEZADO DE LA PAGINA-----------------
$titulo_actual = $con->getTitulo();
if(isset($_POST['cambiar_titulo'])){

    print_r($_POST['titulo_actual']);
    $titulo_nuevo = $_POST['titulo_actual'];
    $con->cambiarTitulo($titulo_nuevo);
    header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
}
//Guardar imagen en el caso que el usuario haya deseado cambiar el icono de la pagina
if(isset($_FILES['icono'])){
    
    $file = $_FILES['icono'];
    $nombre_icono = $file['name'];
    $carpeta = "../img/";
    $ruta_provisional = $file['tmp_name'];
    $tipo = $file['type'];
    $size = $file['size'];
     //Condicional si el archivo no es una imagen
        if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
            echo "El archivo no es una imagen";
        //Condicional si el archivo es superior a 3MB
        }else if($size > 3*1024*1024){
            echo "Error, el tamaño maximo es de 3MB";
        }else{
            $src = $carpeta.$nombre_icono;
            move_uploaded_file($ruta_provisional, $src);
            $imagen='img/'.$nombre_icono;
            //Actualizo el producto con la imagen
            $con->cambiarIcono($imagen);
            echo "Icono Actualizado";
            header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
        }
}
$icono_actual = $con->getIcono();
?>