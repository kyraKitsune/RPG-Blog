<?php
// Afficher le formulaire de modifications avec les informations pré remplit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        include '../Config/bdd.php';
        $sql = 'SELECT * FROM user WHERE id = :id';
        $req = $bdd->prepare($sql);
        $req->execute([':id' => $id]);
        if (!$req->rowCount() == 1){
            die('ERREUR Recherche utilisateur');
        }
        $utilisateur = $req->fetch(PDO::FETCH_ASSOC);
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
        <h1 class="text-center mt-4">Modifier un utilisateur</h1>
        <form action="action.php" method="POST">
        <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo :</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $utilisateur['pseudo'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $utilisateur['name'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="first_name" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $utilisateur['first_name'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="mail" class="form-label">Mail :</label>
                    <input type="text" class="form-control" id="mail" name="mail" value="<?= $utilisateur['mail'] ?>">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="text" class="form-control" id="password" name="password" value="<?= $utilisateur['password'] ?>">
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Envoyer" name="btn_update">
        </div>
        </form>
    </div>
  </body>
</html>