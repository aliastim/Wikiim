<?php

require "../initialisation.php";

echo $twig->render('cours-3D/cours-3d.html.twig', [
    'title' => 'Cours Animation 3D',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);