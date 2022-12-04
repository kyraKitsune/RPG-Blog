<?php

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
        <h1 class="text-center mt-4">Ajouter un utilisateur</h1>
        <form action="action.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo :</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="mail" class="form-label">Mail :</label>
                    <input type="text" class="form-control" id="mail" name="mail">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe :</label>
                    <input type="text" class="form-control" id="mdp" name="mdp">
                </div>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="Envoyer" name="btn_create">
        </div>
        </form>
    </div>
  </body>
</html>