<?php

namespace Classes;

require 'Conexao.php';
use Classes\Conexao;

class deletarUser{
    
    private $conexao;
    
    public function __construct(){
        $this->conexao = Conexao::getconexao();
    }
    
    public function deletar($codigo){
        $sql = "delete from usuario where codigo = ?;";
        try{
            $q = $this->conexao->prepare($sql);
            $q->bindParam(1, $codigo);
            $q->execute();
            
        } catch (Exception $ex) {
            echo "Erro ao apagar registro" . $ex->getMessage();
        }
    }
}