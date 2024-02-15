<?php

class MedioDTO implements JsonSerializable
{

    private $idMedia;
    private $titulo;
    private $idADE;
    private $medio;
    public function __construct($idMedia, $titulo, $idADE, $medio)
    {
        $this->$idMedia = $idMedia;
        $this->$titulo = $titulo;
        $this->$idADE = $idADE;
        $this->$medio = $medio;
    }
    //necesaria para implements JsonSerializable y SÓLO getters SIN setters
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }


    /**
     * Get the value of idMedia
     */
    public function getIdMedia()
    {
        return $this->idMedia;
    }
    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
    /**
     * Get the value of idADE
     */
    public function getIdADE()
    {
        return $this->idADE;
    }
    /**
     * Get the value of medio
     */
    public function getMedio()
    {
        return $this->medio;
    }
}
