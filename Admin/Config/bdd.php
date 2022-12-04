<?php
    $dsn = 'mysql:dbname=blog_rpg;host=localhost';
    $user = 'blog_rpg';
    $password = 'Ir-S(nZNNj[hLmYj';

    try {
        $bdd = new PDO($dsn, $user, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
    }catch(PDOException $e){
        //echo 'Erreur' . $e->getMessage();
        die('Erreur bdd');
    }
?>