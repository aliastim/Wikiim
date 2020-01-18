<?php

require __DIR__ . "/initialisation.php";

use App\Entity\User;


//dump($_POST);

if (isset($_POST['name']) AND isset($_POST['firstname']) AND isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['cursus']))
{
    if (!empty($_POST['name']) AND !empty($_POST['firstname']) AND !empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['cursus'])) {

        $name      = $_POST['name'];
        $firstname = $_POST['firstname'];
        $mail     = $_POST['mail'];
        $password  = $_POST['password'];
        $cursus = $_POST['cursus'];
        $avatar = "1";
        $allowed = "false";

        $repo     = $entityManager->getRepository(User::class);
        try
        {
            $user_verify = $repo->findOneBy(array('mail' => $mail));
            //dump($user_verify);
            if ($user_verify === null)
            {
                $user = new User();
                $user->setName($name);
                $user->setFirstname($firstname);
                $user->setCursus($cursus);
                $user->setAvatar($avatar);
                $user->setMail($mail);
                $user->setPassword($password);
                $user->setAllowed($allowed);
                $entityManager->persist($user);
                $entityManager->flush();
                header('Location:connect.php?inscription');
            }
            else
            {
                echo "l'utilisateur est déjà dans la base de données";
            }

        }
        catch (\PDOException $e)
        {
            echo 'erreur', $e->getMessage();
        }

    }
}