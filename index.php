<?php
    include 'Admin/Config/bdd.php';
    include 'Includes/head.php';
    include 'Includes/header.php';
    $sql = 'SELECT * FROM article ORDER BY published DESC';
    $req = $bdd->query($sql);
    $articles = $req->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($articles);
    include 'Includes/section.php';
    include 'Includes/footer.php';
?>

