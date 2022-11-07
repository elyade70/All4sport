<?php
session_start();

$codeclient=$_SESSION['codeclient'];
echo $codeclient;
require_once "../Model/BDD.php";

$bdd = new Bdd();



if(isset($_GET['idproduit']) && isset($_GET['codeclient']) &&  isset($_GET['prixproduit']) ){
  $idproduit=$_GET['idproduit'];
  $codeclient=$_GET['codeclient'];
  $prixproduit=$_GET['prixproduit'];
  $panier = $bdd->Creerachat($idproduit,$codeclient,$prixproduit);
  



}