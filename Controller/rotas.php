<?php
include "../Controller/CClientes.php";

//salvar & editar
if(filter_input(INPUT_GET,"acao")=="salvar" & (filter_input(INPUT_GET, "tipo")=="cliente")){
    if(filter_input(INPUT_POST,"codigo") !=""){
        CClientes::editarClientes($_POST);
    }else{
        CClientes::salvarClientes($_POST);
    }
  
} 

else if (filter_input(INPUT_GET,"acao")=="excluir" & filter_input(INPUT_GET, "tipo")=="cliente" & filter_input(INPUT_GET,"codigo") != 0){
    CClientes::excluirCliente(filter_input(INPUT_GET,"codigo"));
    
}
?>
