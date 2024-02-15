<?php

class AutorEntity
{

    private $idADE;
    private $nombre;
    private $created_at;
    private $updated_at;

    public function __construct($nombre)
    {
        $this->$nombre = $nombre;
    }

    /**
     * Get the value of idADE
     */
    public function getIdADE()
    {
        return $this->idADE;
    }

    /**
     * Set the value of idADE
     */
    public function setIdADE($idADE): self
    {
        $this->idADE = $idADE;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */
    public function setUpdatedAt($updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
