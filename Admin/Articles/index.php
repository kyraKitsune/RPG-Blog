<?php
// Affiche la liste des articles
include '../Config/bdd.php';
// Generer la requete SQL
$sql = "SELECT * FROM article";
// On demande a PDO d'envoyer la requete a la bdd et de l'executer
$req = $bdd->query($sql);
// On recupère les datas du resultat de la requete
$articles = $req->fetchAll(PDO::FETCH_ASSOC);
// var_dump($articles);

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
            <h1 class="mt-4 mb-4">Liste des articles</h1>
            <a href="create.php" class="btn btn-success">Ajouter un article</a>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Mis à jour</th>
                    <th scope="col">Publié le :</th>
                </tr>
                
            </thead>
            <tbody>

                <?php foreach ($articles as $article) : ?>
                    <tr>
                        <th scope="row"><?= $article['id'];  ?></th>
                        <td><?= $article['title'];  ?></td>
                        <td><?= substr($article['content'], 0, 300) ?></td>
                        <td><?= $article['last_update'];  ?></td>
                        <td><?= $article['published'];  ?></td>
                        <td><a href="update.php?id=<?= $article['id'] ?>" class="btn btn-warning">Modifier</a></td>
                        <td><a href="action.php?id=<?= $article['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                        <td><a href="single.php?id=<?= $article['id'] ?>" class="btn btn-info">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
  </body>
</html>