<?php
require_once __DIR__ . '/../src/entity/asociados.class.php';
require_once __DIR__ . '/../src/utils/File.class.php';
require_once __DIR__ . '/../src/database/connection.class.php';

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
                $imagen->saveUploadFile(Asociados::RUTA_LOGOS_ASOCIADOS);

                $asociado = new Asociados($nombre, $imagen->getFileName(), $descripcion);

                $config = require __DIR__ . '/../app/config.php';
                App::bind('config', $config); // Como ya no se usa datos hardcodeados, 
                $conexion = Connection::make();//Se cambioa la manera de conexion 

                $sql = "INSERT INTO asociados (nombre, logo, descripcion) 
                VALUES (:nombre, :logo, :descripcion)";

                $pdoStatement = $conexion->prepare($sql);

                $parametros = [
                    ':nombre' => $asociado->getNombre(),
                    ':logo' => $asociado->getLogo(),
                    ':descripcion' => $asociado->getDescripcion()
                ];

                if ($pdoStatement->execute($parametros) === false) {
                    $errores[] = "No se ha podido guardar el asociado en la base de datos.";
                } else {
                    $mensaje = "El asociado se ha guardado correctamente.";
                    $nombre = "";
                    $descripcion = "";
                }
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
} ?>


<?php require_once __DIR__ . '/../templates/views/asociados.view.php';
