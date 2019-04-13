<?php

if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

// var_dump($_GET['page']);
// die;

$allPages = scandir('Controllers/');

// var_dump($allPages);
// die;

if (in_array($page.'_controller.php', $allPages)) {
    require 'Models/' . $page . '_model.php';
    require 'Controllers/' . $page . '_controller.php';
    require 'Views/' . $page . '_view.php';
} else {
    
    // On gère à ce moment l'erreur via une redirection vers une pages d'erreur PERSO.
    // Ou bien Via le HTACCESS....
    // Pour ce cas on va utiliser une page d'erreur 404 créer simplement.
    require './Views/Errors/error-404.php';
}