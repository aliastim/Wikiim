<?php

require "../initialisation.php";
use App\Entity\Cours;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{

    $repo     = $entityManager->getRepository(Cours::class);
    $cours_A_Valider = $repo->findBy(
        array(
            'validate' => 'false',
        ),
        array
        (
            'id' => 'DESC',
        ),
        999,
        0
    );

    echo $twig->render('admin.html.twig', [
        'title' => 'Administration',
        'avatar' => $_SESSION['avatar'],
        'cours_a_valider' => $cours_A_Valider,
        'isConnected' => isset($_SESSION['isConnected']),
    ]);
} else
{
    header('Location:connect.php');
}