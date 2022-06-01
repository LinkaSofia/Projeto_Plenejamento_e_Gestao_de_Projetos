  
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=projetoPGP', 'root', '');
    $pdo->exec("set names utf8");