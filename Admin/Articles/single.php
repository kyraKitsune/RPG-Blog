<?php
// Afficher le formulaire de modifications avec les informations pré remplit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        include '../Config/bdd.php';
        $sql = "SELECT * FROM article WHERE id = " . $_GET['id'];
        //var_dump($sql);
        $req = $bdd->prepare($sql);
        $req->execute([':id' => $id]);
        if (!$req->rowCount() == 1){
            die('ERREUR Recherche d\'article');
        }
        $article = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($article);
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
            <h1 class="mt-4">Article</h1>
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
                <tr>
                    <th scope="row"><?= $article['id'];  ?></th>
                    <td><?= $article['title'];  ?></td>
                    <td><?= $article['content'];  ?></td>
                    <td><?= $article['last_update'];  ?></td>
                    <td><?= $article['published'];  ?></td>
                </tr>
            </tbody>
        </table>
    </div>         
</body>
</html>