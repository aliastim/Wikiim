<?php

require "../initialisation.php";

echo $twig->render('cours-DW/cours-dw.html.twig', [
    'title' => 'Cours Développement Web',
    'avatar' => $_SESSION['avatar'],
    'isConnected' => isset($_SESSION['isConnected']),
]);