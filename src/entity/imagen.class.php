<?php
class imagen{

    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA   = '/public/images/index/gallery/';
    const RUTA_IMAGENES_CLIENTES  = '/public/images/clients/';
    const RUTA_IMAGENES_SUBIDAS   = '/public/images/galeria/';
    
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
    private $descripcion;
    /**
     * @var string
     */
    private $categoria;
    /**
     * @var int
     */
    private $numVisualizaciones;
    /**
     * @var int
     */
    private $numLikes;
    /**
     * @var int
     */
    private $numDownloads;

    /**
     * @params string $nombre, string $descripcion, string $categoria, int $numVisualizaciones, int $numLikes, int $numDownloads
     * @return Imagen
     */
    public function __construct(
        string $nombre = "",
        string $descripcion = "",
        string $categoria = "",
        int $numVisualizaciones = 0,
        int $numLikes = 0,
        int $numDownloads = 0
    ){
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    // -------------------- GETTERS --------------------
    public function getId(): ?int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getCategoria(): string { return $this->categoria; }
    public function getNumVisualizaciones(): int { return $this->numVisualizaciones; }
    public function getNumLikes(): int { return $this->numLikes; }
    public function getNumDownloads(): int { return $this->numDownloads; }

    // -------------------- SETTERS --------------------
    /**
     * @param string $nombre
     * @return Imagen
     */
    public function setNombre(string $nombre): Imagen {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @param string $descripcion
     * @return Imagen
     */
    public function setDescripcion(string $descripcion): Imagen {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @param string $categoria
     * @return Imagen
     */
    public function setCategoria(string $categoria): Imagen {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * @param int $numVisualizaciones
     * @return Imagen
     */
    public function setNumVisualizaciones(int $numVisualizaciones): Imagen {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    /**
     * @param int $numLikes
     * @return Imagen
     */
    public function setNumLikes(int $numLikes): Imagen {
        $this->numLikes = $numLikes;
        return $this;
    }

    /**
     * @param int $numDownloads
     * @return Imagen
     */
    public function setNumDownloads(int $numDownloads): Imagen {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    // -------------------- toString --------------------
    /**
     * @return string
     */ 
    public function __toString(): string {
        return $this->descripcion;
    }

    // -------------------- MÉTODOS PARA OBTENER URL --------------------
    /**
     * @return string
     */
    public function getUrlPortfolio(): string {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    /**
     * @return string
     */
    public function getUrlGaleria(): string {
        return self::RUTA_IMAGENES_GALERIA . $this->getNombre();
    }

    /**
     * @return string
     */
    public function getUrlClientes(): string {
        return self::RUTA_IMAGENES_CLIENTES . $this->getNombre();
    }

    /**
     * @return string
     */
    public function getUrlImagenes(): string {
        return self::RUTA_IMAGENES_SUBIDAS . $this->getNombre();
    }
}