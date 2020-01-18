<?php

require __DIR__ . "/initialisation.php";
use App\Entity\User;
//dump($_POST);

if (isset($_POST['mail']) AND isset($_POST['password']))
{
    if (!empty($_POST['mail']) AND !empty($_POST['password']))
    {
        $mail     = $_POST['mail'];
        $password  = $_POST['password'];
        $repo     = $entityManager->getRepository(User::class);
        try {
            $user_verify = $repo->findOneBy(array('mail' => $mail));
            if ($user_verify === null)
            {
                header('Location:connect.php?undefined');
                echo "l'utilisateur n'existe pas";

            } elseif ($user_verify)
            {
                //dump($user_verify);
                if ($mail === $user_verify->getMail() && password_verify($password, $user_verify->getPassword()))
                {
                    if ($user_verify->getAllowed()==='true')
                    {
                        $_SESSION['isConnected']= true;
                        $_SESSION['id'] = $user_verify->getId();
                        $_SESSION['name'] = $user_verify->getName();
                        $_SESSION['firstname'] = $user_verify->getFirstname();
                        $_SESSION['cursus'] = $user_verify->getCursus();
                        $_SESSION['admin_level'] = $user_verify->getAdmin_level();
                        $_SESSION['avatar'] = $user_verify->getAvatar();
                        $_SESSION['num'] = $user_verify->getNum();
                        $_SESSION['mail'] = $user_verify->getMail();
                        $_SESSION['linkedin'] = $user_verify->getLinkedin();

                        //dump($_SESSION);
                        header('Location:index.php');

                    } else
                    {
                        header('Location:connect.php?validate');
                        echo "Profil non validé";
                    }
                } else
                {
                    header('Location:connect.php?erreur');
                    echo "erreur d'identifiant";
                }
            }
        }
        catch (\PDOException $e)
        {
            echo 'erreur', $e->getMessage();
        }
    }
}

