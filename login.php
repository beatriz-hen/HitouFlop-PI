<?php
require_once("conexaobd.php");
?>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'];
$password = $_POST['password'];

$login = "SELECT * FROM tb_usuario WHERE nomeUsuario = '{$username}' and senha = '{$password}'";
$rs_login = mysqli_query($conn_bd_hf, $login) or die($mysqli_error($conn_bd_hf));
$linhas_login = mysqli_num_rows($rs_login);
$row_rs_login = mysqli_fetch_assoc($rs_login);

    if($linhas_login == 1) {
        $_SESSION['logado'] = true;
        $_SESSION['user'] = $username;
        $_SESSION['idUsuario'] = $row_rs_login['idUsuario'];
        header('Location: index.php');
        //exit;

    } else {
        $error = "Nome de usuário ou senha incorreta";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hitOUflop - Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <img src="imagens/logo1.png" alt="Logo" class="logo">
            <h2>Seja bem-vindo à plataforma SIM</h2>
            <p>Faça login abaixo para acessar</p>
            <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" name="username" id="username" placeholder="Digite o seu nome de usuário" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Digite a sua senha" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                </div>
                <a href="forgot.php" class="forgot-password">Esqueci minha senha</a>
            </form>
        </div>
    </div>
</body>
</html>