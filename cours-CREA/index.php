<?php

require "../initialisation.php";

echo $twig->render('cours-CREA/cours-crea.html.twig', [
    'title' => 'Cours Création & Design',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);