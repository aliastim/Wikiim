<?php

require "initialisation.php";
use App\Entity\Cours;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{
    if (isset($_GET['name']) AND !empty($_GET['name']))
    {
        $name =  $_GET['name'];

        $liste_cours = $entityManager->getRepository(Cours::class)->createQueryBuilder('c')
            ->Where('c.name LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->getQuery()
            ->getResult();

        //dump($liste_cours);

        echo $twig->render('recherche_cours.html.twig', [
            'title' => 'Recherche de cours',
            'allcours' => $liste_cours,
            'avatar' => $_SESSION['avatar'],
            'isConnected' => isset($_SESSION['isConnected']),
        ]);

        return;
    }

    echo $twig->render('recherche_cours.html.twig', [
        'title' => 'Recherche de cours',
        'avatar' => $_SESSION['avatar'],
        'isConnected' => isset($_SESSION['isConnected']),
    ]);

} else
{
    header('Location:connect.php');
}