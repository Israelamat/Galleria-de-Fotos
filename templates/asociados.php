<?php 
require_once __DIR__ . '/../src/entity/asociados.class.php';
require_once __DIR__ . '/../src/utils/File.class.php';

$nombre = '';
$descripcion = '';
$errores = '';
$menssajes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    session_start();

    if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
        if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
            $mensaje = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
            $errores = [];
            $nombre = "";
            $descripcion = "";
        } else {
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
        }
    } else {
        $mensaje = "Introduzca el código de seguridad.";
        $errores = [];
        $nombre = "";
        $descripcion = "";
    }
}?>


<?php require_once __DIR__ . '/../templates/views/asociados.view.php';
