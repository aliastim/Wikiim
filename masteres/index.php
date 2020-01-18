<?php

require "../initialisation.php";

echo $twig->render('masteres/masteres.html.twig', [
    'title' => 'Liste des mastères',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);