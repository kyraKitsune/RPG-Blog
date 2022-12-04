<?php
// Gestion de la création
if (isset($_POST['btn_create'])){
    var_dump($_POST);
    $error = false;
    // On boucle sur $_POST pour valider les données
    foreach($_POST as $value){
        if (strlen($value) <= 0){
            // erreur : champ vide
            $error = true;
        }
    }
    // Vérification si erreurs ou pas
    if ($error){
        header('Location:../index.php');
        die;
    }
    // Si pas d'erreur ajout en bdd
    include '../Config/bdd.php';
    include '../Config/functions.php';
    // var_dump($bdd);
    $pseudo = cleanDirtyText($_POST['pseudo']);
    $prenom = cleanDirtyText($_POST['prenom']);
    $nom = cleanDirtyText($_POST['nom']);
    $mail = cleanDirtyText($_POST['mail']);
    $mdp = cleanDirtyText(password_hash($_POST['mdp'], PASSWORD_DEFAULT));
    // Generation de la requete SQL d'ajout
    $sql = "INSERT INTO user VALUES (NULL, '$pseudo', '$prenom', '$nom', '$mail', '$mdp', NOW())";
    // var_dump($sql);
    $req = $bdd->prepare($sql);
    if (!$req->execute()){
        // erreur dans l'ajout
        header('Location:../index.php');
        die;
    }
    // Retour de la validation en session
    header('Location:../index.php');
    die;
}

if (isset($_GET['id'])){
    include '../Config/bdd.php';
    // Generation de la requete SQL pour supprimer
    $sql = "DELETE FROM user WHERE id = " . $_GET['id'];
    // var_dump($sql);
    // Envoie et execution de la requete SQL
    $req = $bdd->prepare($sql);
    // Vérification si req bien execute ou pas (($req == false) = (!$req))
    if (!$req->execute()) {
        // erreur + gestion session
        header('Location:../index.php');
        die;
    }
    // Gestion session pour la validation
    header('Location:../index.php');
    die;
}

// Gestion de la modification
if (isset($_POST['btn_update'])){
    // var_dump($_POST);
    // On charge la connexion a la bdd
    include '../Config/bdd.php';
    include '../Config/functions.php';
    // On génere la requete SQL
    $id = intval($_POST['id']);
    $pseudo = cleanDirtyText($_POST['pseudo']);
    $name = cleanDirtyText($_POST['name']);
    $first_name = cleanDirtyText($_POST['first_name']);
    $mail = cleanDirtyText($_POST['mail']);
    $password = cleanDirtyText(password_hash($_POST['password'], PASSWORD_DEFAULT));
    // Génération du SQL
    $sql = "UPDATE user SET pseudo = '$pseudo', name = '$name', first_name = '$first_name', mail = '$mail', password = '$password', creation_date = NOW() WHERE id = " . $id;
    // var_dump($sql);
    // Envoie et execution de la req sql
    $req = $bdd->prepare($sql);
    if (!$req->execute()){
        // erreur + gestion session
        header('Location:update.php?id=' . $id);
       die;
    }
    // Req ok, + gestion session
    header('Location:../index.php?id=' . $id);
    die;
}
