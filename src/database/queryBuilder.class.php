<?php
require_once __DIR__ . '/../exceptions/QueryException.php';
require_once __DIR__ . '/../entity/Imagen.class.php';
require_once __DIR__ . '/../../core/App.php';
class QueryBuilder
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var string 
     */
    private $table;

    /**
     * @var string
     */
    private $classEntity;
    public function __construct($table, $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }
    /* Función que le pasamos el nombre de la tabla y el nombre
    de la clase a la cual queremos convertir los datos extraidos
    de la tabla.
    La función devolverá un array de objetos de la clase classEntity. */
    /**
     * @param string $table
     * @param string $classEntity
     * @return array
     */
    public function findAll(): array
    {
        $sql = "SELECT * FROM  $this->table";
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false)
            throw new QueryException("No se ha podido ejecutar la query solicitada.");
        /* PDO::FETCH_CLASS indica que queremos que devuelva los datos en un array de clases. Los nombres
        de los campos de la BD deben coincidir con los nombres de los atributos de la clase.
        PDO::FETCH_PROPS_LATE hace que se llame al constructor de la clase antes que se asignen los
        valores. */
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }
}
