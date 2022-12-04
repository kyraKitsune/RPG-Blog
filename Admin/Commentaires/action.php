<?php

    // Gestion de la création
    if (isset($_POST['btn_create'])){
        var_dump($_POST);
        $error = false;
        foreach($_POST as $value){
            if (strlen($value) <= 0){
                $error = true;
            }
        }
        if ($error){
            header('Location:../index.php');
            die;
        }

        include '../Config/bdd.php';
        include '../Config/functions.php';
        $article = cleanDirtyText($_POST['article']); // cleanDirtyText est une fonction avec htmlentities et addslashes
        $author = cleanDirtyText($_POST['author']);
        $content = cleanDirtyText($_POST['content']);
        $sql = "INSERT INTO comment VALUES (NULL, '$article', '$author', '$content', NOW())";
        $req = $bdd->prepare($sql);
        if (!$req->execute()){
            header('Location:../index.php');
            die;
        }
        header('Location:../index.php');
        die;
    }

    // Gestion de la suppression
    if (isset($_GET['id'])){
        include '../Config/bdd.php';
        $sql = "DELETE FROM comment WHERE id = :id";
        $req = $bdd->prepare($sql);
        if (!$req->execute([':id' => $_GET['id']])) {
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
        $article = cleanDirtyText($_POST['article_id']);
        $author = cleanDirtyText($_POST['author']);
        $content = cleanDirtyText($_POST['content']);
        $sql = "UPDATE comment SET article_id = '$article', author = '$author', content = '$content', date = NOW() WHERE id = :id";
        $req = $bdd->prepare($sql);
        if (!$req->execute([':id' => $id])){
            header('Location:update.php?id=' . $id);
        die;
        }
        header('Location:../index.php?id=' . $id);
        die;
    }

?>
