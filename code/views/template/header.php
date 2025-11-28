<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon MVVM App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Custom Style */
        .navbar-custom {
            background-color: #ff3e3e; /* Warna Merah Pokeball */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link.active {
            font-weight: bold;
            background-color: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1; /* Supaya footer selalu di bawah */
        }
    </style>
</head>
<body>

<?php
// Logika untuk menandai menu aktif
$activePage = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php?page=home">
            <i class="fas fa-gamepad"></i> PokéStorage
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= $activePage == 'home' ? 'active' : '' ?>" href="index.php?page=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage == 'pokemon' ? 'active' : '' ?>" href="index.php?page=pokemon">Pokemons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage == 'trainer' ? 'active' : '' ?>" href="index.php?page=trainer">Trainers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage == 'type' ? 'active' : '' ?>" href="index.php?page=type">Types</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $activePage == 'region' ? 'active' : '' ?>" href="index.php?page=region">Regions</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container">
