<?php

class Media
{
    function __construct()
    {
    }

    //GET
    function getAllMedia()
    {
        echo "Hola desde el metodo getAllMedia() de MEDIA BD Controller <br>";
        echo "Los medios almacenados son: <br>";
        $medioDAO = new MedioDAO();
        $medios = $medioDAO->obtenerMedios();
        //        echo var_dump($medios);
        $json = json_encode($medios);
        echo $json . "<br>";
    }
    function getMediaById($id)
    {
        echo "Hola desde el metodo getMediaById() de MEDIA BD Controller <br>";
        echo "El ID del MEDIO es " . $id . "<br>";
        $medioDAO = new MedioDAO();
        $medio = $medioDAO->obtenerMedioPorID($id);
        if ($medio == null) {
            echo "El MEDIO con ID " . $id . " NO EXISTE <br>";
        } else {
            echo "El MEDIO con ID " . $id . " ES: <br>";
            //        echo var_dump($medios);
            $json = json_encode($medio);
            echo $json . "<br>";
        }
    }
    //POST
    public function createMedia($data)
    {
        echo "Hola desde el metodo createMedia() de MEDIA BD Controller <br>";
        echo "Los datos del MEDIO son " . json_encode($data) . "<br>";
        $medioDAO = new MedioDAO();
        $medioDAO->crearMedio($data);
    }
    //PUT
    public function updateMedia($id, $data)
    {
        echo "Hola desde el metodo updateMedia() de MEDIA BD Controller <br>";
        echo "El dato a actualizar del MEDIO con ID " . $id . " es: " . json_encode($data) . "<br>";
        $medioDAO = new MedioDAO();
        $medioActualizar = $medioDAO->obtenerMedioPorID($id);
        if ($medioActualizar == null) {
            echo "El MEDIO con ID " . $id . " NO EXISTE. NO SE ACTUALIZA <br>";
        } else {
            echo "Procedo a actualizar el MEDIO con ID " . $id . "<br>";
            $medioDAO = new MedioDAO();
            $medioDAO->actualizarMedio($id, $data);
        }
    }
    //DELETE
    public function deleteMedia($id)
    {
        echo "Hola desde el metodo deleteMedia() de MEDIA BD Controller <br>";
        echo "El ID del MEDIO es " . $id . "<br>";
        $medioDAO = new MedioDAO();
        $medioBorrar = $medioDAO->obtenerMedioPorID($id);
        if ($medioBorrar == null) {
            echo "El MEDIO con ID " . $id . " NO EXISTE. NO SE BORRA <br>";
        } else {
            echo "Procedo a borrar el MEDIO con ID " . $id . "<br>";
            $medioDAO = new MedioDAO();
            $medioDAO->eliminarMedio($id);
        }
    }
    //ERROR
    public function errorMedia()
    {
        echo "Hola desde el metodo errorMedia() de MEDIA BD Controller <br>";
        echo "ERROR 404!!!<br>";
    }
}
