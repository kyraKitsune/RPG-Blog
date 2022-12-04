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
        <h1 class="text-center mt-4">Ajouter un commentaire</h1>
        <form action="action.php" method="POST">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="article" class="form-label">ID Article :</label>
                    <input type="number" class="form-control" id="article" name="article">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="author" class="form-label">Auteur :</label>
                    <input type="text" class="form-control" id="author" name="author">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu :</label>
                    <textarea name="content" id="content" class="form-control" rows="5"></textarea>
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