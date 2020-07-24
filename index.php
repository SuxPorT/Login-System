<?php
    require_once("./classes/user.php");
    $user = new User();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexys Santiago">
    <meta name="description" content="Conexão do Banco de Dados MySQL com PHP">
    <meta name="keywords" content="programação, MySQL, PHP">
    <meta name="reply-to" content="SuxPorT@hotmail.com">
    <meta name="robots" content="index, follow">
    <meta http-equiv="content-language" content="pt-br">
    <title>Sistema de Login</title>
    <link rel="icon" type="image/png" href="./images/icon.png">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="form-body">
        <h1>Entrar</h1>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email do usuário">
            <input type="password" name="password" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="register.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
        </form>
    </div>

    <?php
        if (isset($_POST["email"])) {
            $email = addslashes($_POST["email"]);
            $password = addslashes($_POST["password"]);

            if (!empty($email) && !empty($password)) {
                /* Parâmetros da classe PDO
                DB Name: "login_system"
                Host: "localhost"
                Username: "user"
                Password: "test_user"
                */
                $user->connect("login_system", "localhost", "user", "test_user");

                if ($user->errorMessage == "") {

                    if ($user->login($email, $password)) {
                        header("location: privateArea.php");
                    }
                    else {
    ?>
                        <div class="error-message">Email e/ou senha estão incorretos</div>
    <?php
                    }
                }
                else {
    ?>
                    <div class="error-message"><?php echo "Erro: " . $errorMessage; ?></div>
    <?php
                }
            }
            else {
    ?>
                <div class="error-message">Preencha todos os campos!</div>
    <?php
            }
        }
    ?>
</body>
</html>