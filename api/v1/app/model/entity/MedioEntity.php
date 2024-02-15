<?php

class MedioEntity
{
    private $idMedio;
    private $titulo;
    private $idADE;
    private $medio;
    private $created_at;
    private $updated_at;

    public function __construct(int $idMedio, string $titulo, string $idADE, string $medio)
    {
        $this->idMedio = $idMedio;
        $this->titulo = $titulo;
        $this->idADE = $idADE;
        $this->medio = $medio;
    }

    /**
     * Get the value of id
     */
    public function getIdMedio()
    {
        return $this->idMedio;
    }

    /**
     * Set the value of id
     */
    public function setIdMedio($idMedio): self
    {
        $this->idMedio = $idMedio;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }
    /**
     * Set the value of idADE
     */
    public function setIdADE($idADE): self
    {
        $this->titulo = $idADE;

        return $this;
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

    /**
     * Set the value of medio
     */
    public function setMedio($medio): self
    {
        $this->titulo = $medio;

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
