<?php
    include 'Config/config.php';
    include 'Config/bdd.php';
    //var_dump(isConnect());
    if (isConnect()){
        header('Location:Commentaires/index.php');
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center mt-5">Connexion</h1>
        <form action="action.php" method="post" class="container">
            <div class="row">
                <div class="mt-5">
                    <label for="mail" class="form-label">Saisissez votre mail</label>
                    <input type="text" class="form-control" name="mail">
                </div>
            <div>
            <div class="row">
                <div class="mt-5 mb-5">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="text" class="form-control" name="mdp">
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Envoyer" name="envoyer">
            </div>
        </form>
    </body>
</html>