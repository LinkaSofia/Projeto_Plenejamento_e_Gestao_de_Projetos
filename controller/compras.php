<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/novo.css">
</head>
<header>
    <div>
        <section>
            <nav>
                <ul class = "ulNav">
                    <li class = "img"><a href="index.php"><img src = "../img/home.png" height="42" width="42"></a></li>
                    <li class = "img"><a href="calendario.php"><img src = "../img/calendar.png" height="42" width="42"></a></li>
                    <li class = "img"><a href="compras.php"><img class = "img"  src = "../img/carrinho-de-compras.png" height="42" width="42"></a></li>
                    <li class = "img"><a href="listar_consultas_exames.php"><img class = "img"  src = "../img/saude.png" height="42" width="42"></a></li>
                    <!--<li><a href="calendario.php">Agenda</a></li>-->
                </ul>
            </nav>
        </section>
    </div>
</header>
<body>
	
<!--
	<style type="text/css">
		.content{
			margin-top: 500px;
			max-width: 400px;
			max-height: 600px;
			margin: auto;
			background: #f3f3f3;
			height: 450px;
			padding: 2%;
			border:1px solid;
		}
		.content h1{
			text-align: center;

		}
		input[type=text]{
			width: 80%;
			height: 30px;
			margin-bottom: 10px;
		}
		input[type=button]{
			border: none;
			width: 17%;
			float: right;
			height: 35px;
		}
		button:hover, input[type=button]:hover{
			background: #ccc;
		}

		button, input[type=button]{ cursor: pointer; }

		button{
			float: right;
			width: 25px;
			padding: 5px;
		}
		.ulcompra{
			list-style-type: none;
			padding: 10px;
			height: 250px;
			background: #fff;
			overflow-y: auto;
		}
		.licompra{
			height: 40px;
			margin: 15px 0 15px 0;
			border-bottom: 1px solid;


		}
        .licompra input[type="checkbox"], .multi-column-check input[type="checkbox"] {
                cursor:pointer;margin-right:5px;
            }
            .licompra.checked {
                background: #e5f8ce url(visto.png) no-repeat 10px center;
                padding-left:32px;
            }
            .licompra.checked input[type="checkbox"] {
                display: none;
            }
           .licompra.checked:hover input[type="checkbox"] {
                display: inline !important;
            }
           .licompra.checked:hover{
                background: #e5f8ce none !important;padding-left:10px;
            }


	</style>
		
</head>-->
<body>
<!--name="task" id='task'-->
	<div class="contentCompra">
        <div class="row">	
            <form method = "POST" action = "ProcessaMercado.php">
                <h1 class = "Lista"> Lista de Compras </h1>
                <form>
                    <input type="text" name="Produto" id='tesk' placeholder="Novo Item..." />
                    <!--<input type="button" name="" 
                            onclick="adicionar();" 
                            value="Cadastrar"/>-->
                    <input type = "submit" value = "Adicionar">
                    <!--<input type= "text" name = "Produto" placeholder = "Digite o Produto" required></br></br>
                    <input type = "submit" value = "Cadastrar"> -->
                </form>
            </form>
        </div>
            <div class="row">
				<div class="col-12">
					<div class="to-do-list-box">
                    <ul id="myList ulcompra">	
						
						<label>Minha Lista </br></label></br>
					
                        <?php
                        include_once("conexao1.php");

                        //consultar no banco de dados
                        $result_lista = "SELECT * FROM mercado ORDER BY IdProduto DESC";
                        $resultado_lista = mysqli_query($conn, $result_lista);

                        //Verificar se encontrou resultado na tabela "mercado"
                        if(($resultado_lista) AND ($resultado_lista->num_rows != 0)){
                            while($row_lista = mysqli_fetch_assoc($resultado_lista)){
                                echo $row_lista['Produto'];
								
								echo "<a class = 'espaco' href='apagar_lista.php?IdProduto=" . $row_lista['IdProduto'] . "'><img src = '../img/excluir.png' height='22' width='22'></a><br><hr>";
			
                            }
                        }else{
                            echo "Nenhum produto encontrado";
                        }
                        ?>
                    </ul>
                    </div>
                </div>
            </div>

	</div>

	<script type="text/javascript">
	
	var ul = document.getElementById("myList");
	var li;
	var itemId;
	var item;
	adicionar	= function (){
		
		if(document.getElementById("Produto").value != ""){

			item   = document.getElementById("Produto");

			itemId = ul.childElementCount;

			li 	   = createItemEl(item.value,itemId);
			li.appendChild(createRemoveTaskBtn(itemId));
			ul.appendChild(li);
			item.value = "";
		}

	}

	removeTask = function( itemId ){

		for( i = 0 ; i < ul.children.length ; i++){

			if(ul.children[i].getAttribute("index") == itemId ){

				ul.children[i].remove();

			}
		}
	}

	createItemEl = function(itemValue, itemId){

		let li = document.createElement("li");

		li.setAttribute("index", itemId);

		li.appendChild(document.createTextNode(itemValue));

		return li;
	}
	
	createRemoveTaskBtn = function(itemId){
		let btn =  document.createElement("button");
		btn.setAttribute("onclick", "removeTask("+itemId+")"); 
		btn.innerHTML ="X";
		/*conn.query("DELETE FROM mercado WHERE IdProduto = 3");*/
		return btn;
	}

    
	
</script>

</body>
</html>
