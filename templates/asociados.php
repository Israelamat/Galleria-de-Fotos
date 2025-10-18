<?php 
require_once __DIR__ . '/../src/entity/asociados.class.php';
require_once __DIR__ . '/../src/utils/File.class.php';

$nombre = '';
$descripcion = '';
$errores = '';
$menssajes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        $mensaje = 'Datos enviados';

        $imagen->saveUploadFile(Asociados::RUTA_LOGOS_ASOCIADOS );
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
}?>


<?php require_once __DIR__ . '/../templates/views/asociados.view.php';
