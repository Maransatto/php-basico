<?php
    $servidor = "127.0.0.1"; // não pode ser localhost
    $usuario = "root";
    $senha = "root";
    $dbname = "aula";

    // Create connection
    $conn = @mysqli_connect(
        $servidor,
        $usuario,
        $senha,
        $dbname
    ) or die ("Erro na conexão");
    
?>