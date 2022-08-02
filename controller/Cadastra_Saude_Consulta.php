<?php
	session_start();
	include_once("conexao1.php");
?>
<!DOCTYPE html>
<html lang = "pt-br">
<head>
	<meta charset="utf-8">
	<title> Saúde </title>
	<link href="assets/css/estilo.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class = "container">
		<h1 class="h1"> Consultas Médicas / Dentistas </h1>
		<div class="left">
			<div id="navVertical">
				<ul>
					<li><a href="#">Consultas</a></li>
			    	<li><a href="./Cadastra_Saude_Exame.php">Exames</a></li>
			  	</ul>
		  	</div>
	  	</div>
		<?php
			if (isset($_SESSION['msgfunc'])) {
				echo $_SESSION['msgfunc'];	
				//Destruir a variavel logo após o uso
				unset($_SESSION['msgfunc']);
			}	
		?>
		<div class="right">
			<form method = "POST" action = "Processa_Saude_Consulta.php">
				<label>Médico / Especialista: </label>
				<input type= "text" name = "medico" required></br></br>

				<label>Data e Hora: </label>
				<input type= "datetime-local" name = "data" placeholder = "Digite a data e hora"></br></br>

				<label>Sintomas: </label>
				<input type= "text" name = "sintomas" placeholder = "Digite os Sintomas"></br></br>

				<br><br>
				<input type = "submit" value = "Cadastrar"> 
			</form><br><br>

            
		<h1 class="h1 h1_2"> Lista de Consultas</h1>
			<span id="conteudo"></span><br><br><br>
			<div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes dos Clientes</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  		<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<span id="visul_usuario"></span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			var qnt_result_pg = 50; //quantidade de registro por página
			var pagina = 1; //página inicial
			$(document).ready(function () {
				listar_consultas(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});
				
			function listar_consultas(pagina, qnt_result_pg){
				var dados = {
					pagina: pagina,
					qnt_result_pg: qnt_result_pg
				}
				$.post('listar_consultas.php', dados , function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}

		</script>
	</div>
</body>
<html>
