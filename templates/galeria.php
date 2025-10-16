<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' )
{
$titulo = trim(htmlspecialchars($_POST['titulo']));
$descripcion = trim(htmlspecialchars($_POST['descripcion']));
$mensaje= 'Datos enviados';
}
else {
 $errores=[]; $titulo=""; $descripcion=""; $mensaje="";
}
?>


<?php require_once __DIR__ . '/views/galeria.view.php';

