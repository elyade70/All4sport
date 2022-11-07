<?php
session_start();
require_once "../Model/BDD.php";
$bdd = new Bdd();
if (isset($_GET['idproduit'])  && isset($_GET['codeclient']) && isset($_GET['prixproduit'])  ) {

  $idproduit= $_GET['idproduit'];
  $codeclient= $_GET['codeclient'];
  $prixproduit= $_GET['prixproduit'];

   $achats = $bdd->Creerachat($idproduit,$codeclient,$prixproduit);


   require "../view/erreur.php";
}