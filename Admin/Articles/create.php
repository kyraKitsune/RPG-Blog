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
        <h1 class="text-center mt-4 mb-4">Ajouter un article</h1>
        <form action="action.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre :</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="">
                    <div class="mb-3">
                        <label for="picture" class="form-label">Image :</label>
                        <input type="file" accept="image/png, image/jpeg" class="form-control" id="picture" name="picture">
                    </div>
                </div>
                <div class="">
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu :</label>
                        <textarea name="content" class="form-control" id="content" rows="20"></textarea>
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