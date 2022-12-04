<?php 
// Affiche la liste des utilisateurs.
include '../Config/bdd.php';
$sql = "SELECT * FROM comment";
$req = $bdd->query($sql);
$comments = $req->fetchAll(PDO::FETCH_ASSOC);
// var_dump($comment);
include "../Config/config.php";
// Retourne au login si jamais la connexion a echoué
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
            <h1 class="mt-4 mb-4">Liste des commentaires</h1>
            <a href="create.php" class="btn btn-success">Ajouter un commentaire</a>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ID Article</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Publié le :</th>
                </tr>
                
            </thead>
            <tbody>

                <?php foreach ($comments as $comment) : ?>
                    <tr>
                        <th scope="row"><?= $comment['id'];  ?></th>
                        <td><?= $comment['article_id'];  ?></td>
                        <td><?= $comment['author'];  ?></td>
                        <td><?= $comment['content'];  ?></td>
                        <td><?= $comment['date'];  ?></td>
                        <td><a href="update.php?id=<?= $comment['id'] ?>" class="btn btn-warning">Modifier</a></td>
                        <td><a href="action.php?id=<?= $comment['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                        <td><a href="single.php?id=<?= $comment['id'] ?>" class="btn btn-info">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
  </body>
</html>