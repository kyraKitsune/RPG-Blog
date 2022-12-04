<?php
    // Gestion de la création
    if (isset($_POST['btn_create'])){
        //var_dump($_POST);
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
        $title = cleanDirtyText($_POST['title']);
        $picture = cleanDirtyText($_FILES['picture']['name']);
        $content = cleanDirtyText($_POST['content']);

        $upload = "../../Images/".$picture;
        move_uploaded_file($_FILES['picture']['tmp_name'],$upload);

        // Generation de la requete SQL d'ajout
        $sql = "INSERT INTO article VALUES (NULL, '$title', :picture, '$content', NOW(), NOW())";
        // var_dump($sql);
        $req = $bdd->prepare($sql);
        if (!$req->execute([':picture' => $picture])){
            // erreur dans l'ajout
            header('Location:../index.php');
            die;
        }
        header('Location:../index.php');
        die;
    }

    if (isset($_GET['id'])){
        include '../Config/bdd.php';
        // Generation de la requete SQL pour supprimer
        $sql = "DELETE FROM article WHERE id = " . $_GET['id'];
        // var_dump($sql);
        $req = $bdd->prepare($sql);
        if (!$req->execute()){
            // erreur dans l'ajout
            header('Location:../index.php');
            die;
        }
        header('Location:../index.php');
        die;
    }

    // Gestion de la modification
    if (isset($_POST['btn_update'])){
        include '../Config/bdd.php';
        include '../Config/functions.php';
        $id = intval($_POST['id']);
        $title = cleanDirtyText($_POST['title']);
        $picture = $_FILES['picture']['name'];
        $content = cleanDirtyText($_POST['content']);
        $published = cleanDirtyText($_POST['published']);

        $upload = "../../Images/".$picture;
        move_uploaded_file($_FILES['picture']['tmp_name'],$upload);

        $sql = "UPDATE article SET title = '$title', picture = '$picture', content = '$content', last_update = NOW(), published = '$published' WHERE id = " . $id;
        var_dump($sql);
        $req = $bdd->prepare($sql);
        if (!$req->execute()){
            header('Location:../index.php');
            die;
        }
        header('Location:../index.php?id=' . $id);
        die;
    }
?>