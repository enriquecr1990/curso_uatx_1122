<?php

class ValidacionesForm
{

    public static function validarPelicula($variablesPost){
        $respuesta = array(
            'estatus' => true,
            'msg' => array()
        );
        if(!isset($variablesPost['titulo']) || $variablesPost['titulo'] == ''){
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'El campo titulo es requerido';
        }if(!isset($variablesPost['genero']) || $variablesPost['genero'] == ''){
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'El campo genero es requerido';
        }if(!isset($variablesPost['duracion'])
            || $variablesPost['duracion'] == ''
            || !is_numeric($variablesPost['duracion'])){
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'El campo duracion es requerido y debe ser un numero entero';
        }if(!isset($variablesPost['sinopsis']) || $variablesPost['sinopsis'] == ''){
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'El campo sinopsis es requerido';
        }
        return $respuesta;
    }

    public static function validarPeliculaModificar($variablesPost){
        $respuesta = self::validarPelicula($variablesPost);
        if(!isset($variablesPost['id'])
            || $variablesPost['id'] == ''
            || !is_numeric($variablesPost['id'])){
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'El campo ID es requerido y debe ser numerico';
        }
        return $respuesta;
    }

    public static function validarPeliculaEliminar($variablesPost){
        $respuesta = array(
            'estatus' => true,
            'msg' => array()
        );
        if(!isset($variablesPost['id'])
            || $variablesPost['id'] == ''
            || !is_numeric($variablesPost['id'])){
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'El campo ID es requerido y debe ser numerico para eliminar';
        }
        return $respuesta;
    }
}