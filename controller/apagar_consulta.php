<?php
session_start();
include_once("./conexao1.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $result_usuario = "DELETE FROM consulta WHERE idConsulta='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Consulta apagada com sucesso</p>";
        header("Location: Cadastra_Saude_Consulta.php");
    }else{
        
        $_SESSION['msg'] = "<p style='color:red;'>Erro, a consulta não foi apagada com sucesso</p>";
        header("Location: Cadastra_Saude_Consulta.php");
    }
}else{  
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma consulta</p>";
    header("Location: Cadastra_Saude_Consulta.php");
}
