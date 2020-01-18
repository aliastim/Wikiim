<?php

require "../initialisation.php";
use App\Entity\Cours;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{
    if (isset($_GET['name']) AND !empty($_GET['name']))
    {
        $name =  $_GET['name'];

        $repo     = $entityManager->getRepository(Cours::class);
        $liste_cours = $repo->findBy(
            array(
                'name' => $name,
            ),
            array
            (
                'id' => 'DESC',
            ),
            999,
            0
        );

        //dump($liste_cours);

        echo $twig->render('admin_liste_cours.html.twig', [
            'title' => 'Admin - Modification de cours',
            'avatar' => $_SESSION['avatar'],
            'allcours' => $liste_cours,
            'isConnected' => isset($_SESSION['isConnected']),
        ]);
    }

} else
{
    header('Location:connect.php');
}