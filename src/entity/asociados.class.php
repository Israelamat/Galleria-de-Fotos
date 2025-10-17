<?php 
class Asociados {

    const RUTA_LOGOS_ASOCIADOS = '/public/images/asociados/';

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $logo;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @params string $nombre, string $logo, string $descripcion, string $imagen
     * @return Asociados
     */
    public function __construct(
        string $nombre, 
        string $logo, 
        string $descripcion)
    {
        $this->nombre =  $nombre;
        $this->logo =  $logo;
        $this->descripcion =  $descripcion;           
    }   

    // -------------------- GETTERS --------------------

    public function getId(): int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getLogo(): string { return $this->logo; }
    public function getDescripcion(): string { return $this->descripcion; }

    // -------------------- SETTERS --------------------
     /**
      * @params string $nombre
      * @return Asociados
      */
      public function setNombre(string $nombre): Asociados {
          $this->nombre = $nombre;
          return $this;
      }

      /**
      * @params string $logo
      * @return Asociados
      */
      public function setLogo(string $logo): Asociados {
          $this->logo = $logo;
          return $this;
      }

      /**
      * @params string $descripcion
      * @return Asociados
      */
      public function setDescripcion(string $descripcion): Asociados {
          $this->descripcion = $descripcion;
          return $this;
      }

    // -------------------- toString --------------------
    /**
     * @return string
     */
    public function __toString(): string {
        return $this->descripcion;
    }


    // -------------------- MÉTODO PARA OBTENER URL --------------------
    /**
     * @return string
     */
    public function getUrl(): string {
        return self::RUTA_LOGOS_ASOCIADOS . $this->getLogo();
    }

}