<?php
include_once "conexao1.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_usuario = "
SELECT 
    idConsulta as id,
    nomeMedico as Medico,
    dataConsulta as Data,
    sintomas as Sintomas
FROM consulta
ORDER BY idConsulta DESC LIMIT $inicio, $qnt_result_pg";

$resultado_usuario = mysqli_query($conn, $result_usuario);

//Verificar se encontrou resultado na tabela
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Médico</th>
				<th>Data</th>
                <th>Sintomas</th>
				<th>Apagar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row_atendimento = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr>
					<th><?php echo $row_atendimento['id']; ?></th>
					<td><?php echo $row_atendimento['Medico']; ?></td>
					<td><?php echo $row_atendimento['Data']; ?></td>
                    <td><?php echo $row_atendimento['Sintomas']; ?></td>
					<td>
						<button type="button" class="btn btn-outline-primary view_data" 
						<h1><?php echo "<a href='apagar_consulta.php?id=" . $row_atendimento['id'] . "'>Deletar</a><br>"; ?></h1>
						<button type="button" class="btn btn-outline-primary view_data" 
						<h1><?php echo "<a href='editar_consulta.php?id=" . $row_atendimento['id'] . "'>Editar</a><br>"; ?></h1>
					</button></td>	
				</tr>
				<?php
			}?>
		</tbody>
	</table>
	<?php
	//Paginação - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(idConsulta) AS num_result FROM consulta";
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
	echo "<div class='alert alert-danger' role='alert'>Nenhuma consulta encontrada!</div>";
}
?>	