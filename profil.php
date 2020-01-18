<?php

require __DIR__ . "/initialisation.php";


if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{

    echo $twig->render('monProfil.html.twig', [
        'title' => 'Profil',
        'avatar' => $_SESSION['avatar'],
        'isConnected' => isset($_SESSION['isConnected']),
    ]);

} else
{
    header('Location:connect.php');
}