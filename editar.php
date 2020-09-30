<?php

use Classes\Editar;

$parametro = filter_input_array(INPUT_GET, FILTER_DEFAULT);

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
require './Classes/Editar.php';

$usu = new editarUser();

if (isset($data ['salvar'])) {

    $usu->editar($parametro ['codigo'], $data ['nome'], $data ['email'], $data ['login'], $data ['senha']);
    header("Location: index.php");
}

$usuario = $usu->getUsuario($parametro['codigo']);
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

        <!--Lincando o bootstrat a pagina-->
        <link rel="stylesheet" href="style/estiloCSS.css" type="text/css">
        <link rel="stylesheet" href="style/formCss.css" type="text/css">

<?php if (isset($data ['salvar'])) { ?>
            <script>
                alert("Usuário editado com sucesso !");
            </script>
        <?php } ?>

    </head>
    <body>
        <div>

            <form action="editar.php?codigo=<?php echo $parametro['codigo']; ?>" method="post" class="letra">
                <nav class="menu">
                    <h1>Editar o Formulário</h1>
                </nav> 

                <br>

                <label for="nome" class="label">Nome:</label>
                <input type="text" class="input" required name="nome" id="nome" placeholder="Alterar nome" value="<?php echo $usuario ['nome'] ?>"/>
                <br/>

                <label for="email" class="label">E-mail:</label>
                <input type="email" class="input" name="email" id="email" placeholder="Alterar email" value="<?php echo $usuario ['email'] ?>" />
                <br/>

                <label for="login" class="label">Login:</label>
                <input type="text" class="input" required name="login" id="login" placeholder="Alterar login" value="<?php echo $usuario ['login'] ?>"/>
                <br/>

                <label for="senha" class="label">Senha:</label>
                <input type="text" class="input"  name="senha" id="senha" placeholder="Colocar a nova senha"/>
                <br/>

                <label for="senha-confirma" class="label">Confirme sua senha:</label>
                <input type="password" class="input" name="senha-confirma" id="senha-confirma" placeholder="Repitir a senha" />
                <br/>


                <button type="submit" class="ButtonLinkPage" id="salvar" name="salvar">Salvar</button>

            </form> 

        </div>
    </body>
</html>
