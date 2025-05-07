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
            <img src="imagens/logo2.png" alt="Logo" class="logo">
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