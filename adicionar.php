<?php

use Classes\Usuario;

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($data ['salvar'])) {
    require './Classes/Usuario.php';

    $usu = new Usuario();
    $usu->inserir($data ['nome'], $data ['email'], $data ['login'], $data ['senha']);
    header("Location: index.php");
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

        <!--Lincando o bootstrat a pagina-->
        <link rel="stylesheet" href="style/estiloCSS.css" type="text/css">
        <link rel="stylesheet" href="style/formCss.css" type="text/css">

        <?php if (isset($data ['salvar'])) { ?>
            <script>
                alert("Usuário cadastrado com sucesso !");
            </script>
        <?php } ?>

    </head>
    <body >
        <div>

            <form action="adicionar.php" method="post" class="letra">
                <nav class="menu">
                    <h1>Preencha o Formulário</h1>
                </nav>    
                
                <br>

                <label for="nome" class="label">Nome:</label>
                <input type="text" class="input" required name="nome" id="nome" placeholder="Coloque seu nome"/>
                <br/>

                <label for="email" class="label">E-mail:</label>
                <input type="email" class="input" name="email" id="email" placeholder="Coloque seu email"/>
                <br/>

                <label for="login" class="label">Login:</label>
                <input type="text" class="input" required name="login" id="login" placeholder="Coloque seu login"/>
                <br/>

                <label for="senha" class="label">Senha:</label>
                <input type="password" class="input" required name="senha" id="senha" placeholder="senha" />
                <br/>

                <label for="senha-confirma" class="label">Confirme sua senha:</label>
                <input type="password" class="input" name="senha-confirma" id="senha-confirma" placeholder="Repitir a senha"/>

                <br/>

                <button type="submit" id="salvar" name="salvar" class="ButtonLinkPage">Salvar</button>

            </form> 

        </div>
        
    </body>
</html>
