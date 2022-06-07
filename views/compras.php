<!DOCTYPE html>
<html>
<head>
	<title>Lista de Compras</title>

	<style type="text/css">
		.content{
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
		ul{
			list-style-type: none;
			padding: 10px;
			height: 250px;
			background: #fff;
			overflow-y: auto;
		}
		li{
			height: 40px;
			margin: 15px 0 15px 0;
			border-bottom: 1px solid;


		}
        li input[type="checkbox"], .multi-column-check input[type="checkbox"] {
                cursor:pointer;margin-right:5px;
            }
            li.checked {
                background: #e5f8ce url(visto.png) no-repeat 10px center;
                padding-left:32px;
            }
            li.checked input[type="checkbox"] {
                display: none;
            }
           li.checked:hover input[type="checkbox"] {
                display: inline !important;
            }
           li.checked:hover{
                background: #e5f8ce none !important;padding-left:10px;
            }


	</style>
	
</head>
<body>

	<div class='content'>
		

			<div class="row">
					
					<div class="col-12">
						<h1> Lista de Compras </h1>
						<form>

							<input type="text" name="task" id='task' placeholder="Novo Item..." />
							<input type="button" name="" 
									onclick="adicionar();" 
									value="adicionar"/>

						</form>

					</div>

			</div>

			<div class="row">
				<div class="col-12">
				
					<div class="to-do-list-box">
					
						<label>Minha Lista</label>
						<ul id="myList">	

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
		
		if(document.getElementById("task").value != ""){

			item   = document.getElementById("task");

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
		return btn;
	}


	
</script>

</body>
</html>
