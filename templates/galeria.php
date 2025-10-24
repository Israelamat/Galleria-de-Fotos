<?php
require_once __DIR__ . '/../src/exceptions/FileException.php';
require_once __DIR__ . '/../src/utils/File.class.php';
require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/database/Connection.class.php';
require_once __DIR__ . '/../src/exceptions/QueryException.php';
require_once __DIR__ . '/../src/database/QueryBuilder.class.php';
require_once __DIR__ . '/../src/exceptions/AppException.php';
require_once __DIR__ . '/../core/App.php';

$titulo = "";
$errores = [];
$descripcion = '';
$mensaje = '';

try {
    $config = require __DIR__ . '/../app/config.php';
    //var_dump($config);
    App::bind('config', $config);
    $conexion = App::getConnection();
    $queryBuilder = new QueryBuilder('imagenes','Imagen');
    $imagenes = $queryBuilder->findAll();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

        $imagen = new File('imagen', $tiposAceptados); // El nombre del input del formulario
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        $imagenGaleria = new Imagen($imagen->getFileName(),$descripcion, "1"); // inicializo 1 para respetar restricciones de foreing key y no se añada a la BD vacio
        $queryBuilder->save($imagenGaleria);
        $mensaje = "Se ha guardado la imagen correctamente";
        $imagenes = $queryBuilder->findAll();
    }

} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage(); //Antes ponia aqui fileException 
} catch ( AppException $appException ){
 $errores[] = $appException->getMessage();
}

require_once 'views/galeria.view.php';
