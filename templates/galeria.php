<?php
require __DIR__ . '/../src/exceptions/FileException.php';
require __DIR__ . '/../src/utils/File.class.php';
require __DIR__ . '/../src/entity/imagen.class.php';
require __DIR__ . '/../src/database/Connection.class.php';
require __DIR__ . '/../src/exceptions/QueryException.php';
require __DIR__ . '/../src/database/QueryBuilder.class.php';

$titulo = "";
$errores = [];
$descripcion = '';
$mensaje = '';

try {
    $conexion = Connection::make();

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

    $queryBuilder = new QueryBuilder($conexion);
    $imagenes = $queryBuilder->findAll('imagenes', 'Imagen');

} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage(); //Antes ponia aqui fileException 
}

require_once 'views/galeria.view.php';
