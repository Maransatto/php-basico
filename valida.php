<?php

session_start();
include_once("conexao.php");

// para validar se a origem do POST foi do botão btnLogin
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if ($btnLogin) {
    $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha      = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    // echo "$email e $senha";

    if ((!empty($email)) && (!empty($senha))) {
        // senha cripografada
        // echo password_hash($senha, PASSWORD_DEFAULT);

        // pesquisar no banco de dados
        $query = "SELECT id_usuario, nome, email, senha FROM usuarios WHERE email = 'fernando.maransatto@gmail.com';";
        $result = @mysqli_query($conn, $query) or die ('Não foi possível executar');

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($senha, $row['senha'])) {
                
                $_SESSION['id_usuario']         = $row['id_usuario'];
                $_SESSION['nome_usuario']       = $row['nome'];
                $_SESSION['email']              = $row['email'];

                header('Location: admin.php');
            } else {
                $_SESSION['msg'] = "Falha na autenticação";
                header('Location: login.php');
            }
        } else {
            $_SESSION['msg'] = "Falha na autenticação";
            header('Location: login.php');
        }

    } else {
        $_SESSION['msg'] = "Informe o usuário e a senha";
        header('Location: login.php');
    }
    
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header('Location: login.php');
}

?>