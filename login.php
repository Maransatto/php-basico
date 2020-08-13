
<?php
session_start();
?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <h2>Área restrita</h2>
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="valida.php">
            <label>E-mail</label>
            <input type="text" name='email' placeholder="Informe seu e-mail">
            <br><br>

            <label>Senha</label>
            <input type="text" name='senha' placeholder="Informe sua senha">
            <br><br>

            <button type="submit" name='btnLogin' value='OK'>OK</button>
        </form>
    </body>
</html>