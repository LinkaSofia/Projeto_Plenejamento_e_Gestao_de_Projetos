<?php
    class Mercado{

        private $IdProduto;
        private $Produto;


        public function getIdProduto(){
            return $this->IdProduto;
        }

        public function setProduto($IdProduto){
            $this->IdProduto = $IdProduto;
        }

        public function getProduto(){
            return $this->Produto;
        }

        public function setIdProduto($Produto){
            $this->Produto = $Produto;
        }


        public function validate(){
            $erros = array();
            if(empty($this->getProduto()))
                $erros[] = "É necessário informar o produto";
            if(empty($this->getIdProduto()))
                $erros[] = "É necessário informar o IdProduto";
            return $erros;                                 
        }

    }
?>