<?php

include "../Model/MClientes.php";
include "../DAO/DClientes.php";
class CClientes{
    public static function salvarClientes($dadosClientes){
        $cliente = new MClientes($dadosClientes['codigo'], $dadosClientes['nome'], $dadosClientes['cpf']);
        print_r($_POST);

        DClientes::salvarCliente($cliente->getNome(), $cliente->getCpf());
    }
    public static function retornarClientes(){
        $clientes = DClientes::carregarClientes();
        return $clientes;
    }

    public static function excluirCliente($codigo){
       DClientes::excluirCliente($codigo);
       header("location: ../View/index.php");
    }
    public static function editarClientes($dadosClientes){
        $cliente = new MClientes($dadosClientes['codigo'], $dadosClientes['nome'], $dadosClientes['cpf']);
        print_r($_POST);


        DClientes::editarCliente($cliente->getCodigo(), $cliente->getNome(), $cliente->getCpf());
    }
}
?>