<?php

/* Insertion d'article */

$pdo = new PDO('mysql:host=localhost;dbname=blog_projet3;charset=utf8', 'root',  '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


$count = $pdo->exec('INSERT INTO billet SET titre="titre test", auteur="gox", contenu="Contenu de test"  ');
var_dump($count);