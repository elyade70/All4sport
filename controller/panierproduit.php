<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

if (isset($_GET['id'])) {
$idproduit=$_GET['id'];
$achats = $bdd->addAchat($idproduit);

require "../View/view_produits.php";
echo"ekip";
}else{
  $idproduit='ELYSPO12345678901';
$achats = $bdd->addAchat($idproduit);

require "../View/view_produits.php";
echo"else";
}