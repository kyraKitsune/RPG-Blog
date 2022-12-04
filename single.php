<?php

    
    if (isset($_GET['id'])){
        include 'Admin/Config/bdd.php';
        $id = intval($_GET['id']);
        if ($id > 0){
            $sql = 'SELECT * FROM article WHERE id = :id';
            $req = $bdd->prepare($sql);
            $req->execute([':id' => $id]);
            if (!$req->rowCount() == 1){
                die('ERREUR Recherche d\'article');
            }
        }
            
        $article = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($article);

        if(isset($_POST['btn_create'])){
            $author = addslashes(htmlentities($_POST['author']));
            $content = addslashes(htmlentities($_POST['content']));
            $sqlAddComm = "INSERT INTO comment (article_id, author, content, date) VALUES ('$id', '$author', '$content', NOW())";
            $addComm = $bdd->prepare($sqlAddComm);
            $addComm->execute();
        }

        $sqlCategorie = 'SELECT * FROM categorie_article INNER JOIN categorie ON categorie_article.id_categorie = categorie.id WHERE categorie_article.id_article = :id';
        $reqCategorie = $bdd->prepare($sqlCategorie);
        $reqCategorie->execute([':id' => $id]);
        $categories = $reqCategorie->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($categories);

        $sqlCommentaire = 'SELECT * FROM article INNER JOIN comment ON article.id = comment.article_id WHERE article.id = :id';
        $reqCommentaire = $bdd->prepare($sqlCommentaire);
        $reqCommentaire->execute([':id' => $id]);
        $commentaires = $reqCommentaire->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($commentaires);
        
    } 

    include 'Includes/head.php';
    include 'Includes/header.php';
?>
    <body>
        <div class="container">
            <p class="color-blank mt-5">Cet article fait parti de la/les catégorie(s): </p>
            <?php foreach ($categories as $categorie) : ?>
            <span class="color-blank"><?= $categorie['libelle'], ','?></span>
            <?php endforeach; ?>
            <h1 class="text-center mt-4 color-blank"><?= $article['title'] ?></h1>
            <img class="img-fluid mb-5 mt-5" src="Images/<?= $article['picture'] ?>" alt="Image">
            <p class="color-blank"><?= str_replace("\n", "<br/>", $article['content']) ?></p>
            <?php foreach ($commentaires as $commentaire) : ?>
            <div class="mt-4 comment">
                <h3 class="color-blank"><?= $commentaire['author'] ?></h3>
                <p class="color-blank"><?= $commentaire['content'] ?></p>
                <span class="color-blank"><?= $commentaire['date'] ?></span>
            </div>
            <?php endforeach; ?>
            <form method="POST">
                <div class="row">
                    <div class="mt-3 mb-3">
                        <label for="author" class="form-label col-3 color-blank">Auteur :
                            <input type="text" class="form-control" id="author" name="author" minlength=3 maxlength=25 placeholder="Votre nom">
                            <span class="count">25</span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="content" class="form-label col-12 color-blank">Contenu :
                            <textarea name="content" class="form-control" id="content" minlength=10 maxlength=999 rows="10" placeholder="Entrez votre texte ici"></textarea>
                            <span class="count" id="textarea">999</span>
                        </label>
                    </div>
                </div>
                <div class="mt-3 mb-5 text-center">
                    <input type="submit" name="btn_create" class="btn btn-primary button" id="btn_add_commentaire" value="Ajouter un commentaire">
                </div>
            </form>
        </div>
    </body>
<?php
    include 'Includes/footer.php';
?>