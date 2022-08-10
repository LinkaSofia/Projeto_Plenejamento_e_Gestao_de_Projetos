<?php
session_start();
include_once("conexao1.php");

$Produto = filter_input(INPUT_POST, 'Produto',FILTER_SANITIZE_STRING);

$result_func = "INSERT INTO mercado(Produto) VALUES ('$Produto')";

if ($conn->query($result_func) == TRUE) {
	echo "Produto Cadastrado";
	header("Location: compras.php");
} else {
	echo "Erro: " . $result_func . "<br>" . $conn->error;
}
$conn->close();
?>