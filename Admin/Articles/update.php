<?php
// Afficher le formulaire de modifications avec les informations pré remplit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        include '../Config/bdd.php';
        $sql = "SELECT * FROM article WHERE id = :id";
        $req = $bdd->prepare($sql);
        $req->execute([':id' => $id]);
        if (!$req->rowCount() == 1){
            die('ERREUR Recherche article');
        }
        $article = $req->fetch(PDO::FETCH_ASSOC);
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
        <h1 class="text-center mt-4">Modifier un article</h1>
        <form action="action.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $article['id'] ?>">
        <div class="row">
            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $article['title'] ?>">
            </div>
            <div class="">
                    <div class="mb-3">
                        <label for="picture" class="form-label">Image :</label>
                        <input type="file" accept="image/png, image/jpeg" class="form-control" id="picture" name="picture">
                    </div>
                </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenu :</label>
                <textarea name="content" class="form-control" id="content" rows="20"><?= $article['content'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Date de création :</label>
                <input type="datetime-local" class="form-control" id="title" name="published" value="<?= $article['published'] ?>">
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Envoyer" name="btn_update">
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>