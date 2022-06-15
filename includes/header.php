<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--<meta charset="UTF-8">
    <meta name="author" content="Antonielli, Linka e Pedro">
    <title>Assistente</title>-->
            <style>
                .circulo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            float: left;
            margin: 15px;
            transition: 0.3s ease;
        }

        .circulo:hover{
            transform: rotateY(180deg);
        }

        .circulo-pequeno {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin: 10px;
            float: left;
            animation: circulo 1s linear infinite;
        }

        .circulo-pequeno.lime {
            animation: circulo-inverno 1s linear infinite;
        }

        @keyframes circulo {
            from {
                transform: rotate(0deg) translateX(30px);
            } to {
                transform: rotate(360deg) translateX(30px);
            }
        }

        @keyframes circulo-inverno {
            from {
                transform: rotate(0deg) translateX(30px);
            } to {
                transform: rotate(-360deg) translateX(30px);
            }
        }

        img {
            display: block;
            max-width: 100%;
        }

        .lime {
            background: springgreen;
        }

        .tomato {
            background: tomato;
        }

        .blue {
            background: blue;
        }

        .container {
            max-width: 520px;
            margin: 20px auto;
        }

        .container::after, .container::before {
            content: '';
            display: table;
            clear: both;
        }

        h1, h2 {
            text-align: center;
            margin: 50px 0;
            font-family: monaco;
            color: #693BB6;
            font-weight: 80;
        }

        h2 {
            margin-bottom: 100px;
        }

        footer {
            text-align: center;
            margin: 40px;
        }

        #origamid {
            font-family: monaco;
            text-decoration: none;
            color: #693BB6;
            display: inline-block;
        }

        #origamid::after, #origamid::before {
            content: '';
            display: block;
            background: #693BB6;
            width: 0;
            height: 2px;
            border-radius: 4px;
            margin: 6px auto 6px auto;
            transition: all .2s ease;
        }

        #origamid:hover::after, #origamid:hover::before {
            width: 100%;
        }

    </style>
</head>

<body>

    <header>
       <!--<input type="checkbox" id="check" onclick="MeuBotaoMenu()">
        <label for="check" class="checkbtn">&#9776;</label>
        <ul id="PrecisoParajs">
            <li><a href="../controller/mercadoController.php">+Mercado</a></li>
            <li><a href="../controller/saudeController">+  Saude</a></li>
            <li><a href="../controller/agendaController">+  Agenda</a></li>
        </ul>
        <a class="icone-configuracoes" href="../views/configuracoes.php"><i class="fas fa-cog"></i></a>
    </header>

<script src="../js/header.js"></script>
</body>-->

<h1>Assistente Pessoal</h1>

<section class="container">
    
    <li class="circulo lime"><a href="../controller/compras.php">Mercado</a></li>
    <div class="circulo lime"><a href="../controller/Cadastra_Saude.php"><h1>SAÚDE</h1></div>
	<div class="circulo lime"><h1>AGENDA</h1></div>
</section>

