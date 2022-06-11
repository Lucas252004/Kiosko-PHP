<?php
require_once('../Model/Conexion.php');
$con = new Conexion();
//----------------MOSTRAR LOS PRODUCTOS DEL CARRITO---------------
$usuario = $con->getUsuarioActual();
$usuario_actual = "";
foreach($usuario as $i){
    $usuario_actual = $i['id_usuario'];
}
$producto_carrito = $con->verCarrito($usuario_actual);
//-----------------BORRAR PRODUCTOS DEL CARRITO-------------------
if(isset($_POST['boton_borrar'])){
    $id_producto = 0;
    $id_producto = $_POST['id_producto'];
    $id_sesion = $_POST['id_sesion'];
    $con->sumarStock($id_producto);
    $con->borrarProductoCarrito($id_sesion);
    echo "<script>alert('Producto Borrado');</script>";
}
//-----------------BORRAR TODOS LOS PRODUCTOS DEL CARRITO AL REALIZAR LA COMPRA--------------
if(isset($_POST['comprar'])){
    $con->borrarTodoCarrito($usuario_actual);
    echo "<script>alert('Compra Realizada con Exito !');</script>";
}
//-----------COLOR ACTUAL DE LA PAGINA------------------
$color_actual = $con->getColorActual();
//-----------COLOR ACTUAL DEL MENU------------------
$color_actual_menu = $con->getColorMenuActual();
require_once('../verCarrito.php');
?>