<?php

require "../initialisation.php";

echo $twig->render('cours-JV/cours-jv.html.twig', [
    'title' => 'Cours Jeux vidéo',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);