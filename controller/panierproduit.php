<?php
session_start();
require_once "../Model/BDD.php";
$bdd = new Bdd();
if (isset($_GET['internet'])) {
  if (isset($_GET['idproduit'])  && isset($_GET['codeclient']) && isset($_GET['prixproduit'])) {

    $idproduit= $_GET['idproduit'];
    $codeclient= $_GET['codeclient'];
    $prixproduit= $_GET['prixproduit'];
    $qte=1;
  
     $achats = $bdd->CreerachatInternet($idproduit,$codeclient,$prixproduit,$qte);
  
  
    //  header("Location:../controller/bddproduits.php");
    require "../view/erreur.php";

}
}if (isset($_GET['magasin'])) {
  if (isset($_GET['idproduit'])  && isset($_GET['codeclient']) && isset($_GET['prixproduit'])) {

    $idproduit= $_GET['idproduit'];
    $codeclient= $_GET['codeclient'];
    $prixproduit= $_GET['prixproduit'];
    $qte=1;
     $achats = $bdd->CreerachatMagasin($idproduit,$codeclient,$prixproduit,$qte);
  
  
    //  header("Location:../controller/bddproduits.php");
    require "../view/erreur.php";
}}
