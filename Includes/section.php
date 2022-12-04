<body>
    <div class="container">
        <h1 class="text-center mt-4">Liste des articles</h1>
        <?php foreach ($articles as $article ) : ?>
        <div class="card text-center mb-5">
            <div class="card-header">
                <p>Mis à jour le : <?= substr($article['last_update'], 0, 10) ?> à <?= substr($article['last_update'], 11) ?></p>
            </div>
            <div class="card-body">
                <h2 class="card-title"><?= $article['title'] ?></h2>
                <p class="card-text"><?= substr($article['content'], 0, 300) ?>..</p>
                <a href="single.php?id=<?= $article['id'] ?>" class="btn btn-primary button">Voir l'article</a>
            </div>
            <div class="card-footer">
                <p>Date de publication : <?= $article['published']?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>

