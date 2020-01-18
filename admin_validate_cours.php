<?php

require "initialisation.php";
use App\Entity\Cours;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{
    if (isset($_POST['id']) AND !empty($_POST['id']))
    {
        $repo     = $entityManager->getRepository(Cours::class);
        $cours = $repo->findOneBy(['id'=>$_POST['id']]);

        $cours->setValidate("true");

        $entityManager->persist($cours);
        $entityManager->flush();

        header('Location:admin/index.php');
    } else
    {
        header('Location:admin/index.php');
    }
} else
{
    header('Location:connect.php');
}