<?php
// Afficher le formulaire de modifications avec les informations pré remplit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        include '../Config/bdd.php';
        $sql = "SELECT * FROM comment WHERE id = " . $_GET['id'];
        //var_dump($sql);
        $req = $bdd->prepare($sql);
        $req->execute([':id' => $id]);
        if (!$req->rowCount() == 1){
            die('ERREUR Recherche de commentaire');
        }
        $comment = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($comment);
    }  
}

include "../Config/config.php";
if (!isConnect()){
    header('Location:../login.php');
    die;
}

include "../Includes/head.php";
include "../Includes/header.php";
?>

<body>
    <div class="container">
        <div class="text-center">
            <h1 class="mt-4">Commentaire</h1>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID article</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Publié le :</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $comment['id'];  ?></th>
                    <td><?= $comment['article_id'];  ?></td>
                    <td><?= $comment['author'];  ?></td>
                    <td><?= $comment['content'];  ?></td>
                    <td><?= $comment['date'];  ?></td>
                </tr>
            </tbody>
        </table>
    </div>         
</body>
</html>