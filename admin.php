<?php
session_start();

if (!empty($_SESSION['id_usuario'])) {
    echo "Olá, ".$_SESSION['nome_usuario'].". Bem vindo <br>";
    echo "<a href='logout.php'>Sair</a>";
} else {
    $_SESSION['msg'] = 'Usuário não autenticado';
    header('Location: login.php');
}


?>