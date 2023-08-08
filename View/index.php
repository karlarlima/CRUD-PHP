<?php
include "../Controller/CClientes.php";
$listaClientes = CClientes::retornarClientes();
//var_dump($_GET);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" href="../Imagens/conta.png" type="image/x-icon">

    <title>Cadastro do Cliente</title>

</head>

<body id="main">
        <p>Alterar Modo</p>
        <label class="switch">
            <input type="checkbox" onclick="darkLight()" id="checkBox" >
            <span class="slider"></span>
        </label>
        
    <div id="container">

        <h1>Cadastro de Clientes</h1>

        <form action="../Controller/rotas.php?acao=salvar&tipo=cliente" method="POST">
            <div class="row texto">
                <label>Código:</label>
                <input type="text" name="codigo" value="<?php echo filter_input(INPUT_GET,"codigo"); ?>" placeholder="-" readonly>
            </div>

            <div class="row texto">
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo filter_input(INPUT_GET,"nome"); ?>" placeholder="Digite seu nome" required autocomplete="off">
            </div>

            <div class="row texto">
                <label>CPF:</label>
                <input type="text" name="cpf" value="<?php echo filter_input(INPUT_GET,"cpf"); ?>" placeholder="Digite seu CPF" required autocomplete="off">
            </div>

            <div class="botao">
                <input type="submit" value="Salvar">
                <input type="reset" value="Limpar">
            </div>
        </form>
    </div>
    </div>
    </div>




    <div class="container1" style="margin-inline: 25%;">
        <!-- Tabelinha -->
                <table id="clientes" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Código</th>
                            <th class="th-sm">Clientes</th>
                            <th class="th-sm">CPF</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                            <th>Dados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaClientes as $clientes) {
                            echo "<tr>
                                            <td>" . $clientes['usu_codigo'] . "</td>
                                            <td>" . $clientes['usu_nome'] . "</td>
                                            <td>" . $clientes['usu_cpf'] . "</td>
                                            <td>
                                                    <a class='linkk' href='index.php?codigo=".$clientes['usu_codigo']."&nome=".$clientes['usu_nome']."&cpf=".$clientes['usu_cpf']."'>
                                                        <input type='button' value='Editar'>
                                                    </a>
                                            </td>
                                            <td>
                                                    <a class='linkk' href='../Controller/rotas.php?acao=excluir&tipo=cliente&codigo=" . $clientes['usu_codigo'] . "'>
                                                        <input type='button' value='Excluir'>
                                                    </a>
                                            </td>
                                            <td>
                                                    <a class='linkk' href='../pdf/relatorio.php?codigo=".$clientes['usu_codigo']."&nome=".$clientes['usu_nome']."&cpf=".$clientes['usu_cpf']."'>
                                                        <input type='button' value='Sobre'>
                                                    </a>
                                            </td>
                                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" language="javascript">
                    $(document).ready(function() {
                        $('#clientes').DataTable({
                            language: {
                                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                            }
                        });
                    });
                </script>

                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                <script>
                    
                    $('#main').toggleClass(localStorage.toggled);

                    function darkLight() {
                    /*DARK*/
                    if (localStorage.toggled != 'dark') {
                        $('#main, p').toggleClass('dark', true);
                        localStorage.toggled = "dark";
                        
                    } else {
                        $('#main, p').toggleClass('dark', false);
                        localStorage.toggled = "";
                    }
                    }

                    if ($('main').hasClass('dark')) {
                    $( '#checkBox' ).prop( "checked", true )
                    } else {
                    $( '#checkBox' ).prop( "checked", false )
                    }

                </script>
    </div>
    
</body>

</html>