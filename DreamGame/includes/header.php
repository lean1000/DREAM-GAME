<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Game</title>

    <link rel="stylesheet" href="./assets/css/finalizar.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/produto.css">
    <link rel="stylesheet" href="./assets/css/perfil.css">
    <link rel="stylesheet" href="./assets/css/busca.css">
    <link rel="stylesheet" href="./assets/css/sobre.css">
    <link rel="stylesheet" href="./assets/css/suporte.css">
    <link rel="stylesheet" href="./assets/css/banner.css">
    <link rel="stylesheet" href="./assets/css/cards.css">
    <link rel="stylesheet" href="./assets/css/destaques.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header>
        <nav>
            <img src="./assets/img/logo/logo.png" alt="logo" class="img-logo">

            <ul class="menu">
                <li><a href="./index.php">Início</a></li>
                <li><a href="./destaques.php">Destaques</a></li>
                <li><a href="./suporte.php">Suporte</a></li>
                <li><a href="./sobre.php">Sobre</a></li>
            </ul>

            <div class="user">
                <?php if (isset($_SESSION['nome'])): ?>
                    <a href="./perfil.php">
                        <i class="bi bi-person icon"></i>
                        <span class="nome-usuario"><?= htmlspecialchars($_SESSION['nome']) ?></span>
                    </a>
                <?php else: ?>
                    <a href="./login.php">
                        <button class="btn-entrar">Entrar</button>
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </header>