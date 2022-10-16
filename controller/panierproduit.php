<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();
$idachat=rand(10,100);

if (isset($_GET['id'])) {
  $idproduit=$_GET['id'];
  $achats = $bdd->creerPanier($idproduit,$idachat);
  echo"jdjd",$idproduit;
  require "../View/panier.php";
  echo"ekip";
  header("Location: ../controller/bddproduits.php");
} 
if(isset($_GET['idachat'])){
  $idachat=$_GET['idachat'];
  echo"ekip";
  $panier = $bdd->Deletepanier($idachat);

  header("Location: ../controller/bddproduits.php");

}
if(isset($_GET['idachatdelete'])){
  $idachat=$_GET['idachatdelete'];
  echo"ekip";
  $panier = $bdd->Creerachat($idachat);

 header("Location: ../controller/bddproduits.php");

}