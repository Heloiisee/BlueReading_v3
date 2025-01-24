<?php
    // views/v_header.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content-security-policy="default-src 'self'; img-src 'self' https://cdn.jsdelivr.net; script-src 'self' https://cdn.jsdelivr.net; style-src 'self' https://cdn.jsdelivr.net; font-src 'self' https://cdn.jsdelivr.net; connect-src 'self';">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/BlueReading_v3/public/css/styles.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="icon" href="/BlueReading_v3/public/images/favicon.ico"> 
    <title>BlueReading</title>
</head>
<body>
<div class="container">
    <div class="row">
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./">
                        <span class="logo-blue">Blue</span><span class="logo-reading">Reading</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item me-3">
                                <a class="nav-link" aria-current="page" href="./">
                                    <i class="fas fa-home me-2"></i>Accueil
                                </a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="?action=ajouter">
                                    <i class="fas fa-plus me-2"></i>Ajouter un livre
                                </a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="?action=bibliotheque">
                                    <i class="fas fa-book me-2"></i>Bibliothèque
                                </a>
                            </li>
                            <li class="nav-item me-3">
                                <a class="nav-link" href="?action=apropos">
                                    <i class="fas fa-info-circle me-2"></i>A propos
                                </a>
                            </li>
                            <li class="nav-item dropdown me-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>Profil
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="?action=profile">
                                            <i class="fas fa-user-circle me-2"></i>Mon Profil
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="?action=settings">
                                            <i class="fas fa-cog me-2"></i>Paramètres
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="?action=deconnexion">
                                            <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</div>
