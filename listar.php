<?php

require './Classes/Usuario.php';

use Classes\Usuario;
$usu = new Usuario();


$usuarios = $usu->listar();

if (isset($data ['excluir'])) {
    require './Classes/Deletar.php';

    $usu = new deletarUser();
    $coigo = $data['codigo'];
    $usuarios = $usu->deletar($codigo);
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style/estiloCSS.css" type="text/css">
    </head>
    <body>
        <div>
        <nav class="menu">
            <h1>Tabela de Usuários</h1>
        </nav>

            <br/>

            <table>

                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Login</th>
                        <th>Opções</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($usuarios as $index => $usuario) { ?>

                        <tr>
                            <td><?php echo $usuario ['codigo']; ?></td>
                            <td><?php echo $usuario ['nome']; ?></td>
                            <td><?php echo $usuario ['email']; ?></td>
                            <td><?php echo $usuario ['login']; ?></td>
                            <td>
                                <a class="ButtonLinkTable" href="editar.php?codigo=<?php echo $usuario['codigo']; ?>&editar">Editar</a> |
                                <a class="ButtonLinkTable" href="eliminar.php?codigo=<?php echo $usuario['codigo']; ?>&excluir">Excluir</a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

            <br>

            <a href="adicionar.php" class="ButtonLink"><h3>Cadastrar novo usuário</h3></a>

        </div>
    </body>
</html>
