<?php
require '../core/DatabaseSingleton.php'; //porque se asume que se llama desde index.php
require '../app/model/DTO/MedioDTO.php';

class MedioDAO
{

    private $db; //MedioDAO.php juega el rol de index.php

    public function __construct()
    {
        $this->db = DatabaseSingleton::getInstance();
    }
    //CRUD
    // - read
    // - update
    // - delete
    // - write
    public function obtenerMedios()
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM media";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo count($result);
        if (count($result) != 0) {
            echo "GET CORRECTA!!!";
        } else {
            echo "ERROR EN GET!!!";
        }
        return $result;
    }
    public function obtenerMedioPorID($id)
    {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM media WHERE idmedia=" . $id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo count($result);
        if (count($result) == 1) {
            echo "GET ID CORRECTA!!!";
        } else {
            echo "ERROR EN GET ID!!!";
        }
        return $result;
    }
    public function crearMedio($data)
    {
        $mydata = json_encode($data);
        $nuevomedio = json_decode($mydata);
        $id = $nuevomedio->id;
        $titulo = $nuevomedio->titulo;
        $idADE = $nuevomedio->idADE;
        $medio = $nuevomedio->medio;
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM media WHERE idmedia=" . $id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo count($result);
        if (count($result) == 1) {
            echo "EXISTE ID: NO SE CREA MEDIO!!!";
        } else {
            echo "NO EXISTE ID: SE CREA MEDIO!!!";
            $query = "INSERT INTO media (idmedia,titulo,idade,medio) VALUES (" . $id . ",\"" . $titulo . "\"," . $idADE . ",\"" . $medio . "\");";
            //            print_r($query);
            $statement = $connection->query($query);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            print_r($result);
            echo count($result);
            if (count($result) == 0) {
                echo "ALTA CORRECTA!!!";
            } else {
                echo "ERROR EN ALTA!!!";
            }
        }
        return $result;
    }
    public function actualizarMedio($id, $data)
    {
        $mydata = json_encode($data);
        $medioact = json_decode($mydata);
        print_r($medioact);
        $titulo = $medioact->titulo;
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM media WHERE idmedia=" . $id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo count($result);
        if (count($result) == 1) {
            echo "EXISTE ID: SE PUEDE ACTUALIZAR MEDIO!!!";
            $query = "UPDATE media SET titulo=\"" . $titulo . "\" WHERE idmedia=" . $id . ";";
            print_r($query);
            $statement = $connection->query($query);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            //            echo count($result);
            if (count($result) == 0) {
                echo "ACTUALIZACION CORRECTA!!!";
            } else {
                echo "ERROR EN ACTUALIZACION!!!";
            }
        } else {
            echo "NO EXISTE ID: NO SE ACTUALIZA MEDIO!!!";
        }
        return $result;
    }
    public function eliminarMedio($id)
    {
        $connection = $this->db->getConnection();
        $query = "DELETE from media WHERE idmedia=" . $id;
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        print_r($result);
        echo count($result);
        if (count($result) == 0) {
            echo "BORRADO CORRECTO!!!";
        } else {
            echo "ERROR EN BORRADO!!!";
        }
        return $result;
    }
}
