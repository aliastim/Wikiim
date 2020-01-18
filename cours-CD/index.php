<?php

require "../initialisation.php";

echo $twig->render('cours-CD/cours-cd.html.twig', [
    'title' => 'Cours Communication Digitale',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);