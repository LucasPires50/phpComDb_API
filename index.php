<?php

//Dependências
require './Classes/Usuario.php';

use Classes\Usuario;

/* API RESTFul em PHP puro */

//Informa para o cliente que será retornado JSON
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

//Captura os parâmetros
$param = filter_input_array(INPUT_GET, FILTER_DEFAULT);

//Captura o método de requisição
$method = $_SERVER ['REQUEST_METHOD'];

//Captura os dados enviados no body
$body = file_get_contents('php://input');

if ($method == "GET") {

    if (isset($param ['codusu'])) {
        //Retorno 1 usuário
    } else {

        $usu = new Usuario();
        $resultado = $usu->listar();
        $usuarios = [];

        foreach ($resultado as $usuario) {
            unset($usuario[0]);
            unset($usuario[2]);
            unset($usuario[3]);
            unset($usuario[4]);
            unset($usuario[5]);
            unset($usuario['senha']);
            $usuarios [] = $usuario;
        }

        echo json_encode($usuarios);
    }
} else if ($method == "POST") {
    
    $usuario = json_decode($body);
    $usu = new Usuario();    
    $usu->inserir($usuario->nome, $usuario->email, $usuario->login, $usuario->senha);
    echo json_encode($usuario);
    
} else if ($method == "PUT") {

    $usu = new Usuario();
    if(isset($param->codigo)){
    $usuario =json_decode($body);
    $usu->editar($parametro->codigo, $usuario->nome, $usuario->email, $usuario->login, $usuario->senha);        
    echo json_encode($usu);
    
} else if ($method == "DELETE") {

    $usuario = json_decode($body);
    $usu = new Usuario();
    $usu->deletar($codigo);
    echo json_encode($usuario);
}
}
?>
