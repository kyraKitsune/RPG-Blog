<?php
    include 'Config/bdd.php';
    include 'Config/config.php';
    
    if(isset($_POST['envoyer'])){
        $sql = "SELECT * FROM user WHERE mail = :mail";
        $req = $bdd->prepare($sql);
        $req->execute([':mail' => $_POST['mail']]);
        $user = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($user);

        if(!$user){
            //Erreur l'user n'existe pas
            $_SESSION['connect'] = false;
            header('Location:login.php');
            die;
        }
        
        if (!password_verify($_POST['mdp'], $user['password'])){
            $_SESSION['connect'] = false;
            header('Location:login.php');
            die;
        } 
        // Déclaration de la connexion en session + sauvegarde de l'utilisateur
        $_SESSION['connect'] = true;
        unset($user['password']);
        // On enregistre l'utilisateur
        $_SESSION['user'] = $user;
        header('Location:Commentaires/index.php');
        die;
    }

    if (isset($_GET['logout']) && $_GET['logout'] == true){
        session_destroy();
        header('Location:http://blog.wip');
        die;
    }
?>