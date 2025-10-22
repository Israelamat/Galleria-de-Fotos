<?php

require __DIR__ . '/../src/exceptions/FileException.php';
require __DIR__ . '/../src/utils/File.class.php';
require __DIR__ . '/../src/entity/imagen.class.php';
require __DIR__ . '/../src/database/connection.class.php';

$titulo = '';
$descripcion = '';
$mensaje = '';
$errores = [];

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
                $titulo = trim(htmlspecialchars($_POST['titulo']));
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
                $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
                $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

                $conexion = Connection::make();

                $sql = "INSERT INTO imagenes (nombre, descripcion, categoria) VALUES (:nombre, :descripcion, :categoria)";
                $pdoStatement = $conexion->prepare($sql);
                $parametros = [
                    ':nombre' => $imagen->getFileName(),
                    ':descripcion' => $descripcion,
                    ':categoria' => '1'
                ];

                if ($pdoStatement->execute($parametros) === false) {
                    $errores[] = "No se ha podido guardar la imagen en la base de datos";
                } else {
                    $descripcion = "";
                    $mensaje = "Se ha guardado la imagen correctamente";
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
}
?>


<?php require_once __DIR__ . '/views/galeria.view.php';
