<?php 

// Affiche la liste des utilisateurs.

// On récupere PDO sur la page
include '../Config/bdd.php';
// Generer la requete SQL
$sql = "SELECT * FROM user";
// On demande a PDO d'envoyer la requete a la bdd et de l'executer
$req = $bdd->query($sql);
// On recupère les datas du resultat de la requete
$utilisateurs = $req->fetchAll(PDO::FETCH_ASSOC);
// On debug le retour du fetchAll
// var_dump($utilisateurs);

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
            <h1 class="mt-4 mb-4">Liste des utilisateurs</h1>
            <a href="create.php" class="btn btn-success">Créer un utilisateur</a>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Mot de passe</th>
                </tr>
                
            </thead>
            <tbody>

                <?php foreach ($utilisateurs as $utilisateur) : ?>
                    <tr>
                        <th scope="row"><?= $utilisateur['id'];  ?></th>
                        <td><?= $utilisateur['pseudo'];  ?></td>
                        <td><?= $utilisateur['name'];  ?></td>
                        <td><?= $utilisateur['first_name'];  ?></td>
                        <td><?= $utilisateur['mail'];  ?></td>
                        <td><?= $utilisateur['password'];  ?></td>
                </tr>
                <thead>
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Créer le :</th>
                </tr>
                </thead>
                <tr>
                        <td><?= $utilisateur['avatar'];  ?></td>
                        <td><?= $utilisateur['creation_date'];  ?></td>
                        
                        <td><a href="update.php?id=<?= $utilisateur['id'] ?>" class="btn btn-warning">Modifier</a></td>
                        <td><a href="action.php?id=<?= $utilisateur['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                        <td><a href="single.php?id=<?= $utilisateur['id'] ?>" class="btn btn-info">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
  </body>
</html>