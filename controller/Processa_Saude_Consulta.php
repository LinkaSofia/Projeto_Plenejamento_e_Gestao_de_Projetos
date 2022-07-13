<?php
session_start();
include_once("conexao1.php");

$medico = filter_input(INPUT_POST, 'medico',FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data',FILTER_SANITIZE_STRING);
$sintomas = filter_input(INPUT_POST, 'sintomas',FILTER_SANITIZE_STRING);

$result_func = "INSERT INTO consulta (nomeMedico, dataConsulta, sintomas) VALUES ('$medico', '$data', '$sintomas')";

if ($conn->query($result_func) == TRUE) {
	echo "Consulta Cadastrada";
	header("Location: Cadastra_Saude_Consulta.php");
} else {
	echo "Erro: " . $result_func . "<br>" . $conn->error;
}
$conn->close();
?>