<?php
// Afficher le formulaire de modifications avec les informations pré remplit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        // On recupere PDO
        include '../Config/bdd.php';
        $sql = "SELECT * FROM user WHERE id = " . $_GET['id'];
        //var_dump($sql);
        $req = $bdd->prepare($sql);
        $req->execute([':id' => $id]);
        if (!$req->rowCount() == 1){
            die('ERREUR Recherche d\'utilisateur');
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
        <div class="text-center">
            <h1 class="mt-4">Utilisateur</h1>
        </div>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Date de création</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $utilisateur['id'];  ?></th>
                    <td><?= $utilisateur['pseudo'];  ?></td>
                    <td><?= $utilisateur['name'];  ?></td>
                    <td><?= $utilisateur['first_name'];  ?></td>
                    <td><?= $utilisateur['mail'];  ?></td>
                    <td><?= $utilisateur['password'];  ?></td>
                    <td><?= $utilisateur['creation_date'];  ?></td>
                </tr>
            </tbody>
        </table>
    </div>         
</body>
</html>