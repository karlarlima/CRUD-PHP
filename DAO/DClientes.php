<?php

class DClientes
{
    public static function salvarCliente($nome, $cpf)
    {
        require "conexao.php";

        $conexaoDB = Conexao::criarInstancia();

        $sql = $conexaoDB->prepare("INSERT INTO `tb_usuarios` (`usu_codigo`, `usu_nome`, `usu_cpf`) VALUES (NULL, ?, ?);");

        try {

            $sql->execute(array($nome, $cpf));
            header("location: ../View/index.php");
        } catch (Exception $ex) {

            echo $ex;
            return 0;
        }
    }

    public static function carregarClientes()
    {

        require "conexao.php";
        $conexaoBD = Conexao::criarInstancia();
        $sql = "SELECT * FROM tb_usuarios;";
        try {
            $stmt = $conexaoBD->query($sql);
            return $stmt->fetchAll();
        } catch (Exception $ex) {
            echo $ex;
            return 0;
        }
    }

    public static function excluirCliente($codigo)
    {
        require "conexao.php";

        $conexaoDB = Conexao::criarInstancia();

        $sql = $conexaoDB->prepare("DELETE FROM tb_usuarios where usu_codigo = ?");

        try {

            $sql->execute(array($codigo));
            
        } catch (Exception $ex) {

            echo $ex;
            return 0;
        }
    }

    public static function editarCliente($codigo, $nome, $cpf)
    {
        require "conexao.php";

        $conexaoDB = Conexao::criarInstancia();

        $sql = $conexaoDB->prepare("UPDATE tb_usuarios set usu_nome = ?, usu_cpf = ? where usu_codigo = ?");

        try {

            $sql->execute(array($nome, $cpf, $codigo));
            header("location: ../View/index.php");
        } catch (Exception $ex) {

            echo $ex;
            return 0;
        }
    }
}
?>