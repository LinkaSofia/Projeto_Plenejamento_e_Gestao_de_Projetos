<?php
session_start();
include_once("conexao1.php");

$descricao = filter_input(INPUT_POST, 'descricao',FILTER_SANITIZE_STRING);
$dthora = filter_input(INPUT_POST, 'dthora',FILTER_SANITIZE_STRING);

$result_func = "INSERT INTO exames(descricao, dataExame) VALUES ('$descricao', '$dthora')";

if ($conn->query($result_func) == TRUE) {
	echo "Exame Cadastrado";
	header("Location: Cadastra_Saude_Exame.php");
} else {
	echo "Erro: " . $result_func . "<br>" . $conn->error;
}
$conn->close();
?>