<?php

require __DIR__ . "/initialisation.php";

if (isset($_GET['inscription']))
{
    $inscription = "inscription";
}
if (isset($_GET['validate']))
{
        $validate="validate";
}
if (isset($_GET['erreur']))
{
        $erreur="erreur";
}
if (isset($_GET['undefined']))
{
        $undefined="undefined";
}

echo $twig->render('connect.html.twig', [
    'title' => 'Wikiim - Authentification',
    'isConnected' => isset($_SESSION['isConnected']),
    'inscription' => isset($inscription),
    'validate' => isset($validate),
    'erreur' => isset($erreur),
    'undefined' => isset($undefined),
]);