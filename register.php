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
    <title>Sistema de Login - Registrar</title>
    
    <link rel="icon" type="image/png" href="./images/icon.png">
    <link rel="stylesheet" href="./css/style.css">

    <script type="text/javascript">
    function goBack() {
        window.history.back();
    }
    </script>
</head>
<body>
    <div id="register-form-body">
        <h1>Registrar</h1>
        <form method="POST">
            <input type="text" name="name" placeholder="Nome completo" maxlength="30" >
            <input type="text" name="phone" placeholder="Telefone" maxlength="30" >
            <input type="email" name="email" placeholder="Email" maxlength="40" >
            <input type="password" name="password" placeholder="Senha" maxlength="15" >
            <input type="password" name="confPassword" placeholder="Confirmar senha" maxlength="30" >
            <input type="submit" value="CADASTRAR">
        </form>
        <button id="return-button" onclick="goBack();">Voltar</button>
    </div>

    <?php
        if (isset($_POST["name"])) {
            $name = addslashes($_POST["name"]);
            $phone = addslashes($_POST["phone"]);
            $email = addslashes($_POST["email"]);
            $password = addslashes($_POST["password"]);
            $confPassword = addslashes($_POST["confPassword"]);

            if (!empty($name) && !empty($phone) && !empty($email) && !empty($password) && !empty($confPassword)) {
                /* Parâmetros da classe PDO
                DB Name: "login_system"
                Host: "localhost"
                Username: "user"
                Password: "test_user"
                */
                $user->connect("login_system", "localhost", "user", "test_user");

                if ($user->errorMessage == "") {

                    if ($password == $confPassword) {

                        if ($user->register($name, $phone, $email, $password)) {
    ?>
                            <div id="success-message">Cadastrado com sucesso! <a href="index.php">Acesse para entrar!</a></div>
    <?php
                        }
                        else {
    ?>
                            <div class="error-message">Email já cadastrado!</div>
    <?php
                        }
                    }
                    else {
    ?>
                        <div class="error-message">Senha e confirmar senha não correspondem!</div>
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