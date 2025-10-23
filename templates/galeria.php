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
    App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios
    $conexion = App::getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

        $imagen = new File('imagen', $tiposAceptados); // El nombre del input del formulario
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        $sql = "INSERT INTO imagenes (nombre, descripcion, categoria)
                VALUES (:nombre, :descripcion, :categoria)";
        $pdoStatement = $conexion->prepare($sql);

        $parametros = [
            ':nombre' => $imagen->getFileName(),
            ':descripcion' => $descripcion,
            ':categoria' => '1'
        ];

        if ($pdoStatement->execute($parametros) === false) {
            $errores[] = "No se ha podido guardar la imagen en la base de datos.";
        } else {
            $mensaje = "Se ha guardado la imagen correctamente.";
        }
    }

    $queryBuilder = new QueryBuilder('imagenes', 'imagen');
    $imagenes = $queryBuilder->findAll();
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage(); //Antes ponia aqui fileException 
} catch ( AppException $appException ){
 $errores[] = $appException->getMessage();
}

require_once 'views/galeria.view.php';
