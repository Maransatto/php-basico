<?php
session_start();

unset(
    $_SESSION['id_usuario'],
    $_SESSION['nome_usuario'],
    $_SESSION['email']
);

$_SESSION['msg'] = 'Usuário não autenticado';
header('Location: login.php');
?>