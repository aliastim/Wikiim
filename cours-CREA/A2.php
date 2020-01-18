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
        $classe = "Bachelor - Création & design";

        if (isset($_GET['validation']))
        {
            $validation=true;
        }

        $repo_cours_categorie     = $entityManager->getRepository(Cours_categorie::class);
        $intitulecours = $repo_cours_categorie->findBy(
            array(
                'name' => $cours,
                'annee' => "A2",
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

        echo $twig->render('cours-CREA/cours-A2.html.twig', [
            'title' => 'Cours Création & Design - A2',
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
                'axe' => 'Bachelor - Création & design',
                'annee' => 'A2',
            ),
            array
            (
                'id' => 'DESC',
            ),
            999,
            0
        );

        echo $twig->render('cours-CREA/cours-CREA-A2.html.twig', [
            'title' => 'Cours Création & Design - A2',
            'cours_categories' => $cours_categories,
            'avatar' => $_SESSION['avatar'],
            'isConnected' => isset($_SESSION['isConnected']),
        ]);
    }
} else
{
    header('Location:connect.php');
}