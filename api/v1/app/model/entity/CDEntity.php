<?php

require 'MedioEntity.php';

class CD extends MedioEntity {
    public $itunes;
    public $amazonmusic;

    function __construct( $idMedio, $titulo, $idADE, $medio, $itunes, $amazonmusic){
     parent::__construct( $idMedio, $titulo, $idADE, $medio);
     $this->itunes=$itunes;
     $this->amazonmusic=$amazonmusic;
    }  
    
    /**
     * Get the value of itunes
     */
    public function getItunes()
    {
        return $this->itunes;
    }
    /**
     * Set the value of itunes
     */
    public function setItunes($itunes): self
    {
        $this->itunes = $itunes;

        return $this;
    }

    /**
     * Get the value of itunes
     */
    public function getAmazonmusic()
    {
        return $this->amazonmusic;
    }
    /**
     * Set the value of amazonmusic
     */
    public function setAmazonmusic($amazonmusic): self
    {
        $this->itunes = $amazonmusic;

        return $this;
    }

}



