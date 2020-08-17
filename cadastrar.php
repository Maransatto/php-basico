
<?php
session_start();
ob_start();

$btnCadastro = filter_input(INPUT_POST, 'btnCadastro', FILTER_SANITIZE_STRING);

if ($btnCadastro) {
    include_once('conexao.php');
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    // var_dump($dados);

    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);

    $query = "
        INSERT INTO usuarios (nome, email, senha)
        VALUES ('".$nome."', '".$email."', '".$senha."')
    ";
    $result = @mysqli_query($conn, $query) or die ('Erro ao cadastrar usuário');

    if (mysqli_insert_id($conn)) {
        $_SESSION['msgLogin'] = 'Usuário cadastrado com sucesso';
        header('Location: login.php');
    } else {
        $_SESSION['msg'] = 'Erro ao cadastrar usuário';
    }
}

?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="utf-8">
        <title>Cadastro</title>
    </head>
    <body>
        <h2>Cadastro</h2>
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="">
            <label>Nome</label>
            <input type="text" name='nome' placeholder="Informe seu nome">
            <br><br>

            <label>E-mail</label>
            <input type="text" name='email' placeholder="Informe seu e-mail">
            <br><br>

            <label>Senha</label>
            <input type="password" name='senha' placeholder="Informe sua senha">
            <br><br>

            <button type="submit" name='btnCadastro' value='OK'>OK</button>

            <br><br>
            <a href="login.php">Login</a>
        </form>
    </body>
</html>