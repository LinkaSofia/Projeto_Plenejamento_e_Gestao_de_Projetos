<?php
include_once "../controller/classes/SaudeDAO.php";
if(!isset($_GET['acao'])){
    $obj = new SaudeDAO();
    $lista = $obj->listar();
    include "views/listaMercado.php";
}
else {    
	switch($_GET['acao']){
        case 'adiciona':
            if(!isset($_POST['adiciona'])){ 
                include "views/cadastraMercado.php";              
            }
            else{
                $obj = new Mercado();
                $obj->setProduto($_POST['field_produto']);
              
                $erros = $obj->validate();
                if(count($erros) != 0){ 
                    include "views/cadastraMercado.php";                       
                }
            }
        break;
        
        case 'altera':
            if(!isset($_POST['altera'])){ 
                $obj = new MercadoDAO();
                $mercado = $obj->buscar($_GET['produto']);
                include "views/alteraMercado.php";
            }
            else{ 
                $obj = new Mercado();
                $obj->setproduto($_POST['field_produto']);
                $erros = $obj->validate();
                if(count($erros) != 0){
                    include "views/alteraMercado.php";                      
                }
                else{ 
                    $destino = "../img/".$_FILES['field_imagem']['name']; 
                    if(move_uploaded_file($_FILES['field_imagem']['tmp_name'], $destino)){
                        $bd = new MercadoDAO();
                        if($bd->alterar($obj))
                            header("Location: mercadoController.php"); 
                    }
                    else{
                        $erros[] = "Erro no upload";
                        include "views/cadastraMercado.php";                        
                    }
                }
            }
            break;

        case 'exclui':
            $bd = new MercadoDAO();
            if($bd->excluir($_GET['produto']))
                header("Location: mercadoController.php"); 
            break;
        
        default:
            echo "Ação não permitida";  
                      
    }
} 

?>

