<?php
session_start();
include_once("conexao1.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $result_usuario = "DELETE FROM exames WHERE idExames='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Exame apagado com sucesso</p>";
        header("Location: Cadastra_Saude_Exame.php");
    }else{
        
        $_SESSION['msg'] = "<p style='color:red;'>Erro, o exame não foi apagado com sucesso</p>";
        header("Location: Cadastra_Saude_Exame.php");
    }
}else{  
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um exame</p>";
    header("Location: Cadastra_Saude_Exame.php");
}
