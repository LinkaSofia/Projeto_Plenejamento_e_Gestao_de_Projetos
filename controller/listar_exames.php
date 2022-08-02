<?php
include_once "conexao1.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_usuario = "
SELECT 
	e.idExames as id,
    e.descricao as descricao,
    e.dataExame as Data
FROM exames e
ORDER BY e.idExames DESC LIMIT $inicio, $qnt_result_pg";

$resultado_usuario = mysqli_query($conn, $result_usuario);

//Verificar se encontrou resultado na tabela
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Descrição</th>
				<th>Data</th>
				<th>Apagar / Editar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_atendimento = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr>
					<th><?php echo $row_atendimento['id']; ?></th>
					<td><?php echo $row_atendimento['descricao']; ?></td>
					<td><?php echo $row_atendimento['Data']; ?></td>
					<td>
						<button type="button" class="btn btn-outline-primary view_data" 
							<h1><?php echo "<a href='apagar_exame.php?id=" . $row_atendimento['id'] . "'>Deletar</a><br>"; ?></h1>
						</button>
						<button type="button" class="btn btn-outline-primary view_data" 
							<h1><?php echo "<a href='editar_exame.php?id=" . $row_atendimento['id'] . "'>Editar</a><br>"; ?></h1>
						</button>
					</td>	
					</td>	
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Curso</h4>
			  </div>
			  <div class="modal-body">
				<form method="POST" action="http://localhost/janela-modal-para-editar-produto/processa.php" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="recipient-name" class="control-label">Nome:</label>
					<input name="nome" type="text" class="form-control" id="recipient-name">
				  </div>
				  <div class="form-group">
					<label for="message-text" class="control-label">Detalhes:</label>
					<textarea name="detalhes" class="form-control" id="detalhes"></textarea>
				  </div>
				<input name="id" type="hidden" class="form-control" id="id-curso" value="">
				
				<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger">Alterar</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient = button.data('whatever') // Extract info from data-* attributes
		  var recipientnome = button.data('whatevernome')
		  var recipientdetalhes = button.data('whateverdetalhes')
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title').text('ID ' + recipient)
		  modal.find('#id-curso').val(recipient)
		  modal.find('#recipient-name').val(recipientnome)
		  modal.find('#detalhes').val(recipientdetalhes)
		  
		})
	</script>
	<?php
	//Paginação - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(idExames) AS num_result FROM exames";
	$resultado_pg = mysqli_query($conn, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);

	//Quantidade de pagina
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;

	echo '<nav aria-label="paginacao">';
	echo '<ul class="pagination">';
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_agenda(1, $qnt_result_pg)'>Primeira</a> </span>";
	echo '</li>';
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_agenda($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	echo '<li class="page-item active">';
	echo '<span class="page-link">';
	echo "$pagina";
	echo '</span>';
	echo '</li>';

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_agenda($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='listar_agenda($quantidade_pg, $qnt_result_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';

}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum exame encontrado!</div>";
}
?>	