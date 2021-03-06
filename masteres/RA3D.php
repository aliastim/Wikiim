<?php

require  "../initialisation.php";
use App\Entity\Cours_categorie;
use App\Entity\Cours;

if (isset($_SESSION['isConnected']) AND  $_SESSION['isConnected']= true)
{
    if (isset( $_GET['cours']) and !empty( $_GET['cours']))
    {
        $cours = $_GET['cours'];
        //$classe = $_GET['classe'];
        $classe = "Mastère - RA3D";

        if (isset($_GET['validation']))
        {
            $validation=true;
        }

        $repo_cours_categorie     = $entityManager->getRepository(Cours_categorie::class);
        $intitulecours = $repo_cours_categorie->findBy(
            array(
                'name' => $cours,
            ),
            array
            (
                'id' => 'DESC',
            ),
            999,
            0
        );
        //dump($intitulecours);
        foreach($intitulecours as $element)
        {
            if ($element->getAxe()===$classe)
            {
                $intitulecours=$element;
                //dump($intitulecours);
                break;
            }
        }


        $repo_cours     = $entityManager->getRepository(Cours::class);
        $allcours = $repo_cours->findBy(
            array(
                'cours_categorie' => $intitulecours->getId(),
                'validate' => "true",
            ),
            array
            (
                'id' => 'DESC',
            ),
            999,
            0
        );
        //dump($allcours);

        echo $twig->render('masteres/RA3D-courscategorie.html.twig', [
            'title' => 'Cours Réalisation et animation 3D',
            'cours' => $cours,
            'classe' => $classe,
            'allcours' => $allcours,
            'validation' => isset($validation),
            'avatar' => $_SESSION['avatar'],
            'isConnected' => isset($_SESSION['isConnected']),
        ]);
    } else
    {
        $repo     = $entityManager->getRepository(Cours_categorie::class);
        $cours_categories = $repo->findBy(
            array(
                'axe' => 'Mastère - RA3D',
            ),
            array
            (
                'id' => 'DESC',
            ),
            999,
            0
        );

        echo $twig->render('masteres/RA3D-cours.html.twig', [
            'title' => 'Cours Réalisation et animation 3D',
            'cours_categories' => $cours_categories,
            'avatar' => $_SESSION['avatar'],
            'isConnected' => isset($_SESSION['isConnected']),
        ]);
    }
} else
{
    header('Location:connect.php');
}