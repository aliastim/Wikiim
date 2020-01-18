<?php

require "initialisation.php";
use App\Entity\User;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']=== true)
{
    if (isset($_POST['avatar']) AND !empty($_POST['avatar']))
    {
        $repo     = $entityManager->getRepository(User::class);
        $user = $repo->findOneBy(['id'=>$_SESSION['id']]);

        $user->setAvatar($_POST['avatar']);
        $_SESSION['avatar'] = $user->getAvatar();

        $entityManager->persist($user);
        $entityManager->flush();

        header('Location:profil.php');
    } else
    {
        header('Location:profil.php');
    }
} else
{
    header('Location:profil.php');
}