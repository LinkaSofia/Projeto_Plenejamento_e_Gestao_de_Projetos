<?php
    session_start();
    include_once("conexao1.php");
    $id = filter_input(INPUT_GET, 'IdProduto', FILTER_SANITIZE_NUMBER_INT);
    if(!empty($id)){
        $result_lista = "DELETE FROM mercado WHERE IdProduto='$id'";
        $resultado_lista = mysqli_query($conn, $result_lista);
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
            header("Location: compras.php");
        }else{
            
            $_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
            header("Location: compras.php");
        }
    }else{	
        $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
        header("Location: compras.php");
    }
?>
