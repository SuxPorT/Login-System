<?php
    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: index.php");
        exit;
    }
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
    <title>Sistema de Login - Área Privada</title>
    <link rel="icon" type="image/png" href="./Images/icon.png">
    <link rel="stylesheet" href="./Css/style.css">
</head>
<body>
	<div class="private-area" id="success-message">
	    Seja bem-vindo!
	    <a href="exit.php" >Sair</a>
	</div>
</body>
</html>