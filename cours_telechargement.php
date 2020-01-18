<?php

require __DIR__ . "/initialisation.php";
use App\Entity\Cours;
use App\Entity\Cours_categorie;
use App\Entity\User;
use App\Repository\UserRepo;

$lienretour = $_POST['lienRetour'];


$maxsize = 10000000000000;
$extensions_valides = array( 'jpg' , 'jpeg' , 'png', 'odt', 'odf', 'xlsx', 'pdf', 'doc', 'docx', 'ppt', 'pptx', 'zip' );

if (isset($_POST['title_document']) AND isset($_POST['coursname']) AND isset($_POST['axe']) AND isset($_FILES['document']))
{
    if (!empty($_POST['title_document'])  AND !empty($_POST['coursname']) AND !empty($_POST['axe']) AND !empty($_FILES['document']))
    {
        if ($_FILES['document']['error'] > 0 )
        {
            $erreur = "Erreur lors du transfert || Le fichier est trop gros côté HTML";
            echo "Erreur lors du transfert";
        } else
        {
            if ($_FILES['document']['size'] > $maxsize)
            {
                $erreur = "Le fichier est trop gros";
                echo "Le fichier est trop gros";

            } else
            {
                $extension_upload = strtolower(  substr(  strrchr($_FILES['document']['name'], '.')  ,1)  );
                if ( in_array($extension_upload,$extensions_valides) )
                {
                    $nom = md5(uniqid(rand(), true));
                    $nom = "cours-ressources/{$nom}{$_SESSION['id']}.{$extension_upload}";
                    $resultat = move_uploaded_file($_FILES['document']['tmp_name'],$nom);
                    if ($resultat) echo "Transfert réussi";

                    $repo = $entityManager->getRepository(Cours::class);
                    $repo_user = $entityManager->getRepository(User::class);
                    $repo_courscategorie = $entityManager->getRepository(Cours_categorie::class);


                   try
                    {
                        $user = $repo_user->findOneBy(['mail' =>  $_SESSION['mail']]);
                        //$courscategorie = $repo_courscategorie->findOneBy(['name' => $_POST['coursname']]);
                        $courscategorie = $repo_courscategorie->findBy(
                            array(
                                'name' => $_POST['coursname'],
                            ),
                            array
                            (
                                'id' => 'DESC',
                            ),
                            999,
                            0
                        );
                        foreach($courscategorie as $element)
                        {
                            if ($element->getAxe()===$_POST['axe'])
                            {
                                $courscategorie=$element;
                                //dump($courscategorie);
                                break;
                            }
                        }

                        if ($user === null || $courscategorie === null)
                        {
                            echo "cet utilisateur n'existe pas en base de données ou l'axe de cours défini n'existe pas";
                        } else
                        {
                            //dump($user);
                            //dump($courscategorie);

                            $cours = new Cours();
                            $cours->setName($_POST['title_document']);
                            $cours->setFile($nom);
                            $cours->setType($_FILES['document']['type']);
                            $cours->setUploader($user);
                            $cours->setCours_categorie($courscategorie);
                            $cours->setAxe($_POST['axe']);
                            $cours->setValidate("false");
                            $entityManager->persist($cours);
                            $entityManager->flush();
                            header('Location:'.$lienretour.'&validation');

                        }

                    }
                    catch (Exception $e)
                    {
                        echo 'erreur', $e->getMessage();
                    }


                } else
                {
                    echo "extension non autorisée";
                    $erreur = "Extension incorrecte";
                }
            }
        }


















    } else
    {
        echo "Tous les champs ne sont pas rempli !";
    }
} else
{
    header('Location:'.$lienretour);
}