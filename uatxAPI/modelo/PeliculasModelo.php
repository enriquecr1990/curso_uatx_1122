<?php

class PeliculasModelo
{

    public function listadoRegistros(){
        $datos = array(
            array(
                'id' => 1,
                'titulo' => 'Spiderman',
                'genero' => 'Accion',
                'duracion' => 190,
                'director' => 'Sam Reily',
                'sinopsis' => 'La pelicula del espectacular hombre arana'
            ),
            array(
                'id' => 2,
                'titulo' => 'El titanic',
                'genero' => 'Fantasia',
                'duracion' => 190,
                'director' => 'Creador titanic',
                'sinopsis' => 'La pelicula donde sale rous'
            ),
            array(
                'id' => 3,
                'titulo' => 'Una pelicula',
                'genero' => 'Fantasia',
                'duracion' => 190,
                'director' => 'alguien la hizo',
                'sinopsis' => 'La pelicula donde sale una persona'
            )
        );
        return $datos;
    }

    public function agregar($variablesPost){
        return false;
    }

    public function modificar($variablesPost){
        return true;
    }

    public function eliminar($idPelicula){
        return true;
    }

}