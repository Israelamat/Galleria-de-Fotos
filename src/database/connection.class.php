<?php
class Connection
{
    /**
     * @param $config
     * @return PDO
     */
    public static function make($config)
    {
        try {
            $connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $PDOException) {
            die($PDOException->getMessage()); // Se muestra la excepció como si fuera un echo y detiene la ejecución del script
        }
        return $connection;
    }
}
