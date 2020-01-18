<?php

require __DIR__ . "/initialisation.php";

echo $twig->render('langages-web.html.twig', [
    'title' => 'Cours Développement Web',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);