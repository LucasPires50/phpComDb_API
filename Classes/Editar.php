<?php

require 'Conexao.php';

use Classes\Conexao;

class editarUser {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getconexao();
    }

    public function editar($codigo, $nome, $email, $login, $senha) {
        $sql = "update usuario set nome = ?, email = ?, login = ?, senha = ? where codigo = ?;";
        try {
            $q = $this->conexao->prepare($sql);
            $q->bindParam(1, $nome);
            $q->bindParam(2, $email);
            $q->bindParam(3, $login);
            $senha = md5($senha);
            if(!empty($senha)){
                $q->bindParam(4, $senha);
            } else {
                return null;
            }
            $q->bindParam(5, $codigo);

            $q->execute();
        } catch (Exception $ex) {
            echo "Erro ao atualizar registro: " . $ex->getMessage();
        }
    }

    public function getUsuario($codigo) {
        $sql = "select codigo, nome, email, login from usuario where codigo = ?;";
        $q = $this->conexao->prepare($sql);
        $q->bindParam(1, $codigo);
        $q->execute();
        
        $usuario = [];
        
        foreach ($q as $resultado) {
            $usuario = $resultado;
            break;            
        }
        return $usuario;
        
    }

}
