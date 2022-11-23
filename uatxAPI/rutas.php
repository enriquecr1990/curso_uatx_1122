<?php
include_once 'controlador/PeliculasControlador.php';
//creacion de variables del controlador
$peliculasCtrl = new PeliculasControlador();
//var_dump($peliculasCtrl);exit;

$variablesGet = $_GET;

$variablesPost = $_POST;

$respuesta = array(
    'estatus' => true,
    'msg' => array(),
);
if(isset($variablesGet['controlador']) && $variablesGet['controlador'] != ''){
    switch ($variablesGet['controlador']){
        case 'peliculas':
            if(isset($variablesGet['funcion']) && $variablesGet['funcion'] != ''){
                switch ($variablesGet['funcion']){
                    case 'listado':
                        $respuesta['datos'] = $peliculasCtrl->listado();
                        break;
                    case 'agregar':
                        $respuesta = $peliculasCtrl->agregar($variablesPost);
                        break;
                    case 'modificar':
                        $respuesta = $peliculasCtrl->modificar($variablesPost);
                        break;
                    case 'eliminar':
                        $respuesta = $peliculasCtrl->eliminar($variablesPost);
                        break;
                }
            }else{
                $respuesta['msg'] = 'Huy, no puedo hacer lo que me pides, falta la funcion';
            }
            break;
        case 'dulceria':
            break;
        default:
            $respuesta['estatus'] = false;
            $respuesta['msg'][] = 'Lo siento, no existe el controlador que envias';
            break;
    }
}else{
    $respuesta['msg'] = 'No existe controlador en la variable, favor de validar';
}

echo json_encode($respuesta);exit;