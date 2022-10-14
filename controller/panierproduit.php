<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();
$idpanier=rand(10,100);

if (isset($_GET['id'])) {
  $idproduit=$_GET['id'];
  $achats = $bdd->creerPanier($idproduit,$idpanier);
  echo"jdjd",$idproduit;
  require "../View/panier.php";
  echo"ekip";
  header("Location: ../controller/bddproduits.php");
} 
