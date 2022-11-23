<?php

include_once 'modelo/PeliculasModelo.php';
include_once 'helper/ValidacionesForm.php';

class PeliculasControlador
{

    private $peliculaModelo;

    function __construct()
    {
        $this->peliculaModelo = new PeliculasModelo();
    }

    public function listado(){
        $datos = $this->peliculaModelo->listadoRegistros();
        return $datos;
    }

    public function agregar($variablesPost){
        $respuestaControlador = array(
            'estatus' => true,
            'msg' => array()
        );
        //validar el formulario antes de llegar al modelo
        $validacion = ValidacionesForm::validarPelicula($variablesPost);
        if($validacion['estatus']){
            //ir al modelo para guardar la informacion correspondiente
            $guardar = $this->peliculaModelo->agregar($variablesPost);
            if($guardar){
                $respuestaControlador['msg'] = 'Se guardo la pelicula con exito';
            }else{
                $respuestaControlador['estatus'] = false;
                $respuestaControlador['msg'] = 'No fue posible guardar la pelicula, intenta mas tarde';
            }
        }else{
            $respuestaControlador['estatus'] = false;
            $respuestaControlador['msg'] = $validacion['msg'];
        }
        return $respuestaControlador;
    }

    public function modificar($variablesPost){
        $respuestaControlador = array(
            'estatus' => true,
            'msg' => array()
        );
        //validar campos
        $validacion = ValidacionesForm::validarPeliculaModificar($variablesPost);
        if($validacion['estatus']){
            //vamos al modelo para actualizar los datos
            $actualizar = $this->peliculaModelo->modificar($variablesPost);
            if($actualizar){
                $respuestaControlador['msg'] = 'Se actualizo la pelicula correctamente';
            }else{
                $respuestaControlador['estatus'] = false;
                $respuestaControlador['msg'] = 'No fue posible actualizar la pelicula';
            }
        }else{
            $respuestaControlador['estatus'] = false;
            $respuestaControlador['msg'] = $validacion['msg'];
        }
        return $respuestaControlador;
    }

    public function eliminar($variablesPost){
        $respuestaControlador = array(
            'estatus' => true,
            'msg' => array()
        );
        //validar campos
        $validacion = ValidacionesForm::validarPeliculaEliminar($variablesPost);
        if($validacion['estatus']){
            //vamos al modelo para actualizar los datos
            $eliminar = $this->peliculaModelo->eliminar($variablesPost['id']);
            if($eliminar){
                $respuestaControlador['msg'] = 'Se elimino la pelicula correctamente';
            }else{
                $respuestaControlador['estatus'] = false;
                $respuestaControlador['msg'] = 'No fue posible eliminar la pelicula';
            }
        }else{
            $respuestaControlador['estatus'] = false;
            $respuestaControlador['msg'] = $validacion['msg'];
        }
        return $respuestaControlador;
    }

}