<?php
session_start();
include_once("conexao1.php");
$idExame = filter_input(INPUT_GET, 'idExame', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM exames WHERE idExame = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<body>
		<form method="POST" action="editar_exame.php">
			<input type="hidden" name="idExame" value="<?php echo $row_usuario['idExame']; ?>">
			
			<label>Descrição: </label>
			<input type="text" name="descricao" placeholder="Digite o nome completo" value="<?php echo $row_usuario['descricao']; ?>"><br><br>
			
			<label>Data Exame: </label>
			<input type="email" name="dataExame" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['dataExame']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>
