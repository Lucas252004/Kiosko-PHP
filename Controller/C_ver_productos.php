<?php
//Creo una clase Conexion
require_once('Model/Conexion.php');

$con = new Conexion();
//Llamo a la funcion getProductos() y almaceno el valor en una variable
$productos = $con->getProductos();
//Llamo a la function getUsuarioActual() para saber que usuario esta conectado actualmente
$usuario = $con->getUsuarioActual();
$usuario_actual = "";
$categorias = $con->getCategorias();
//-----------------AÑADIR AL CARRITO---------------------
if(isset($_POST['boton'])){
    $id_producto = [];
    $id_producto = $_POST['id_producto'];
    foreach($usuario as $i){
        $usuario_actual = $i['id_usuario'];
    }
    $con->agregarCarrito($usuario_actual, $id_producto);
    $con->restarStock($id_producto);
    header("Location: http://localhost/proyecto_php/index.php");
}
//---------------FILTRAR POR CATEGORIAS-----------------
if(isset($_POST['filtrar'])){
    $categoria = $_POST['lista_categorias'];
    if($categoria != 'todo'){
        $productos = $con->getProductoCategoria($categoria);
    }else{
        $productos = $con->getProductos();
    }
}
//----------COLOR ACTUAL DE LA PAGINA-----------
$color_actual = $con->getColorActual();
//-----------COLOR ACTUAL DEL MENU------------------
$color_actual_menu = $con->getColorMenuActual();
//----------ENCABEZADO DE LA PAGINA-----------------
$titulo_actual = $con->getTitulo();
$icono_actual = $con->getIcono();
require_once('Views/V_verProductos.php');
?>