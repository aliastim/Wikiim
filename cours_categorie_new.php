<?php

require __DIR__ . "/initialisation.php";

use App\Entity\Cours_categorie;


//dump($_POST);

if (isset($_POST['name']) AND isset($_POST['axe']) AND isset($_POST['annee']))
{
    if (!empty($_POST['name']) AND !empty($_POST['axe']) AND !empty($_POST['annee'])) {

        $name = $_POST['name'];
        $axe = $_POST['axe'];
        $annee = $_POST['annee'];

        $repo     = $entityManager->getRepository(Cours_categorie::class);
        $cours_categorie = new Cours_categorie();
        $cours_categorie->setName($name);
        $cours_categorie->setAxe($axe);
        $cours_categorie->setAnnee($annee);
        $entityManager->persist($cours_categorie);
        $entityManager->flush();
        header('Location:admin');

    }
    else
    {
        header('Location:admin?error');
    }
}
else
{
    header('Location:admin?error');
}