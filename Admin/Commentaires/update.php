<?php
// Afficher le formulaire de modifications avec les informations pré remplit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        include '../Config/bdd.php';
        $sql = 'SELECT * FROM comment WHERE id = :id';
        $req = $bdd->prepare($sql);
        $req->execute([':id' => $id]);
        if (!$req->rowCount() == 1){
            die('ERREUR Recherche de commentaire');
        }
        $comment = $req->fetch(PDO::FETCH_ASSOC);
    } 
}
else {
    die('erreur');
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
        <h1 class="text-center mt-4 mb-4">Modifier un commentaire</h1>
        <form action="action.php" method="POST">
            <input type="hidden" name="id" value="<?= $comment['id'] ?>">
            <div class="row">
                <div class="col">
                    <div class="mb-3 mt-4">
                        <label for="article_id" class="form-label">ID article :</label>
                        <input type="number" class="form-control" id="article_id" name="article_id" value="<?= $comment['article_id'] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 mt-4">
                        <label for="author" class="form-label">Auteur :</label>
                        <input type="text" class="form-control" id="author" name="author" value="<?= $comment['author'] ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu :</label>
                        <textarea name="content" id="content" class="form-control" rows="5"><?= $comment['content'] ?></textarea>
                    </div>
                </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Envoyer" name="btn_update">
            </div>
        </form>
    </div>
  </body>
</html>