<?php

require __DIR__ . "/initialisation.php";

//dump($_SESSION);

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']= true)
{
    echo $twig->render('homepage.html.twig', [
        'title' => 'WIKIIM - Dashboard',
        'avatar' => $_SESSION['avatar'],
        'isConnected' => isset($_SESSION['isConnected']),
    ]);
} else
{
    header('Location:connect.php');
}