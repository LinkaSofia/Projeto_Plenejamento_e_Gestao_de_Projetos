<?php
include_once "conexao1.php";


//consultar no banco de dados
$result_usuario = "SELECT id, title, start, end FROM events where color = '#228B22'";

$resultado_usuario = mysqli_query($conn, $result_usuario);
	?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='../css/core/main.min.css' rel='stylesheet' />
    <link href='../css/daygrid/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="../css/novo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
</head>
<header>
    <div>
        <section id="header">
            <nav id="nav">
                <ul>
                    <li><a href="agenda.php">Agenda</a></li>
                    <li><a href="cadastrofuncionario.php">Cadastros</a></li>
                </ul>
            </nav>
        </section>
    </div>
</header>
<body>
    
    <h1 class = "titulo">Consultas / Exames</h1>
	<!--<table class= "table table-striped table-bordered table-hover">-->
    <div class= "cointainer tab">
        <table class="bordered striped centered highlight responsive-table tabela">
            <thead>
                <tr>
                    <th class = "thtab">ID</th>
                    <th class = "thtab">Descrição</th>
                    <th class = "thtab">Data Inicial</th>
                    <th class = "thtab">Data Final</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row_atendimento = mysqli_fetch_assoc($resultado_usuario)){
                    ?>
                    <tr>
                        <th class = "thtab"><?php echo $row_atendimento['id']; ?></th>
                        <td class = "thtab"><?php echo $row_atendimento['title']; ?></td>
                        <td class = "thtab"><?php echo $row_atendimento['start']; ?></td>
                        <td class = "thtab"><?php echo $row_atendimento['end']; ?></td>
                        </tr>
                    <?php
                }?>
            </tbody>
        </table>
    </div
</body>
</html>
	