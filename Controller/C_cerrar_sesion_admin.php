<?php
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/proyecto_php/Views/iniciar_sesion_admin.php");
?>