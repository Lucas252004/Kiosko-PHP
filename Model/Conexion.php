<?php
//Creo una clase conexion
class Conexion{
    private $con; 
    //constructor
    public function __construct()
    {
        //me conecto a la base de datos bd_prueba
        $this->con = new mysqli('localhost', 'root', '', 'bd_test');
    }
    //Funcion getProductos
    public function getProductos(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM productos');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    //Esta funcion se utiliza para insertar productos a la base de datos
    public function insertar($nombre_producto, $descripcion, $nombre, $imagen, $cantidad){
        $sql = $this->con->query("INSERT INTO productos (nombre_producto, descripcion, precio, imagen, cantidad) VALUES ('$nombre_producto', '$descripcion', '$nombre', '$imagen', '$cantidad')");
        echo  "<script>alert('Producto Guardado');</script>";
       
    }
    public function agregarCarrito($usuario_actual, $id_producto){
        $sql = $this->con->query("INSERT INTO carrito_usuarios(id_sesion, id_producto) VALUES ('$usuario_actual', '$id_producto')");
    }
    public function verCarrito($id_usuario){
        $sql = $this->con->query("SELECT * FROM productos INNER JOIN carrito_usuarios ON productos.id_producto = carrito_usuarios.id_producto WHERE carrito_usuarios.id_sesion = '$id_usuario'");
        $i = 0;
        $retorno = [];
        while($fila = $sql->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
    public function borrarProductoCarrito($id_carrito){
        $sql = $this->con->query("DELETE FROM carrito_usuarios WHERE id_carrito = '$id_carrito'");
       // echo "Producto supuestamente borrado";
    }
    public function borrarTodoCarrito(){
        $sql = $this->con->query("DELETE FROM carrito_usuarios");
    }
    public function restarStock($id_producto){
        $sql = $this->con->query("UPDATE productos SET cantidad = cantidad - 1 WHERE id_producto = '$id_producto'");
    }
    public function sumarStock($id_producto){
        $sql = $this->con->query("UPDATE productos SET cantidad = cantidad + 1 WHERE id_producto = '$id_producto'");
    }
    public function insertarUsuarios($id_usuario, $email, $nombre_usuario){
        $sql = $this->con->query("INSERT IGNORE usuarios SET id_usuario = '$id_usuario', email = '$email', nombre_usuario = '$nombre_usuario'");
    }
    public function insertarUsuarioActual($id_usuario){
        //$sql = $this->con->query("INSERT IGNORE usuario_actual SET id_usuario = '$id_usuario'");
        $sql = $this->con->query("REPLACE INTO usuario_actual (id, id_usuario) VALUES (1, '$id_usuario')");
    }
    public function getUsuarioActual(){
        $query = $this->con->query('SELECT * FROM usuario_actual');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    }

?>