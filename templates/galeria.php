<?php
require __DIR__ . '/../src/exceptions/FileException.php';
require __DIR__ . '/../src/utils/File.class.php';
require __DIR__ - '/../src/entity/imagen.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
        $mensaje = "Datos enviados";

        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS );
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
}
?>


<?php require_once __DIR__ . '/views/galeria.view.php';
