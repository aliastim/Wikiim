<?php

require __DIR__ . "/initialisation.php";

echo $twig->render('homepage.html.twig', [
    'title' => 'Mon site web',
    'isConnected' => isset($_SESSION['isConnected']),
]);