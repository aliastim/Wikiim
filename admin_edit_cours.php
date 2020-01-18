<?php

require "initialisation.php";
use App\Entity\Cours;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{
    if (isset($_POST['name']) AND !empty($_POST['name']) AND isset($_POST['id']) AND !empty($_POST['id']))
    {
        $repo     = $entityManager->getRepository(Cours::class);
        $cours = $repo->findOneBy(['id'=>$_POST['id']]);

        $cours->setName($_POST['name']);

        $entityManager->persist($cours);
        $entityManager->flush();

        header('Location:admin/liste_cours.php?name='.$_POST['name']);
    } else
    {
        header('Location:admin/index.php');
    }
} else
    {
        header('Location:connect.php');
    }