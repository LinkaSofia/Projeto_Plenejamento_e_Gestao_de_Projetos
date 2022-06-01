<?php
    require_once "Conexao.php";
    require_once "Mercado.php";

    class MercadoDAO{
        
        public $conexao;

        public function __construct(){
            $this->conexao = Conexao::conecta();
        }

        public function listar(){
            try{
                $query = $this->conexao->prepare("select * from mercado order by IdProduto");
                $query->execute();
                $registros = $query->fetchAll(PDO::FETCH_CLASS, "Mercado");
                return $registros;
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

        public function buscar($Mercado){
            try{
                $query = $this->conexao->prepare("select * from Mercado where IdProduto=:i");
                $query->bindParam(":i", $IdProduto, PDO::PARAM_INT);
                $query->execute();
                $registros = $query->fetchAll(PDO::FETCH_CLASS, "Mercado");
                return $registros[0];
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }        

        public function inserir(Mercado $Mercado){
            try{
                $query = $this->conexao->prepare("insert into Mercado values (:i, :p)");
                $query->bindValue(":i", $IdProduto->getIdProduto());
                $query->bindValue(":p", $Produto->getProduto());
                return $query->execute();
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

        public function alterar(Mercado $Mercado){
            try{
                $query = $this->conexao->prepare("update Mercado set Produto = :p where IdProduto = :i");
                $query->bindValue(":i", $IdProduto->getIdProduto());
                $query->bindValue(":p", $Produto->getProduto());
                return $query->execute();
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

        public function excluir($Mercado){
            try{
                $query = $this->conexao->prepare("SET foreign_key_checks = 0;
                delete * from Mercado" );
                $query->bindValue(":i", $IdProduto);
                return $query->execute();
            }
            catch(PDOException $e){
                echo "Erro no acesso aos dados: ". $e->getMessage();
            }
        }

    }

?>   
