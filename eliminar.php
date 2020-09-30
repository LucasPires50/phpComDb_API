<?php

require './Classes/Deletar.php';

use Classes\deletarUser;

$data = filter_input_array(INPUT_GET, FILTER_DEFAULT);


if (isset($data ['excluir'])) {

    
    
    $usu = new deletarUser();
    $codigo = $data['codigo'];
    $usu->deletar($codigo);
    header("Location: index.php");
}
