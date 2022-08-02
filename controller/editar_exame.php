<?php

session_start();
include_once("conexao1.php");

$id = filter_input(INPUT_POST, 'idExames', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$dataExame = filter_input(INPUT_POST, 'dataExame', FILTER_SANITIZE_EMAIL);

echo "descricao: $descricao <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE exames SET descricao='$descricao', dataExame='$dataExame' WHERE idExames='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'Exame salvo com sucesso</p>";
	header("Location: Cadastra_Saude_Exame.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Exame não foi salvo com sucesso</p>";
	header("Location: Cadastra_Saude_Exame.php?id=$id");
}