<?php

require __DIR__ . "/initialisation.php";

echo $twig->render('ajouter_un_cours.html.twig', [
    'title' => 'Ajouter un cours',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);