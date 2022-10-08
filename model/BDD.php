<?php
class Bdd
{
  private $bdd;


   function __construct(){

    $dsn = 'mysql:dbname=all5sport;host=127.0.0.1';
    $dbUser = 'root';
    $dbPwd = '';

    try {
      $this->bdd = new PDO($dsn, $dbUser, $dbPwd);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


   function getProduits()
  {
    $sql = "SELECT reference_produit,cout_unitaire,description_produit,quantite_stock_internet,fournisseur_nom,quantite_stock_magasin,photo,photo_libelle FROM produits 
    Inner join photo on reference_produit=photo.fk_pr 
    Inner join fournisseur on fk_fo=id_fournisseur 
    inner join eststock on reference_produit=eststock.fk_pr;
    
    ;"; 
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  function GetOneProduit($id){
   $sql= "SELECT reference_produit,cout_unitaire,description_produit,quantite_stock_internet,fournisseur_nom,quantite_stock_magasin,photo,photo_libelle,lieu
    FROM produits 
   Inner join photo on reference_produit=photo.fk_pr 
   Inner join fournisseur on fk_fo=id_fournisseur 
   inner join eststock on reference_produit=eststock.fk_pr
   inner join stock on fk_sto=stock_id
   WHERE reference_produit= '$id'";
   $query = $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
    header("Refresh:0");

  }
  function getRayons(){
    $sql = "SELECT * FROM rayon";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  function addproduits($fournisseur,$prix,$description,$stockonline,$storestock,$lieu,$idrayon)
  {
    $insert = "INSERT INTO produits ('reference_produit', 'nom_fournisseur', 'cout_unitaire', 'description', 'stock_internet', 'stock_magasin', 'lieu_stockage', 'fk_ray') 
    VALUES(:ref, :nomfour,:prix, :descriptif:stockonline,:stockmag,:lieu,:fk_ray ) ";
    $query =  $this->bdd->prepare($insert);
    $query->execute(array(":ref" => $ray.$four.$res ,
    ":nomfour" => $fournisseur,
    ":prix" => $prix ,
    ":descriptif" => $description ,
    ":stockonline" => $stockonline ,
    ":stockmag" => $storestock ,
    ":lieu" => $lieu ,
    ":fk_ray" => $idrayon ));
    return $query->fetchall();
    header('Location: http://www.google.com/');
    echo("ekiio");
    var_dump($query->errorInfo());
  }
  function addAchat($idproduit){

$insert1 = "INSERT INTO achat(id_achat, achat_libelle, fk_statut) VALUES(:idachat,:libelle,:statut);";
$insert2="INSERT INTO achete(date, fk_cl, fk_ac) VALUES (:dateI,:client,:idachat);"; 
$insert3="INSERT INTO contient(fk_pr, fk_ac) VALUES (:produit,:idachat); ";

    $d = new DateTime();
    $query1 =  $this->bdd->prepare($insert1);
    $query2 =  $this->bdd->prepare($insert2);
    $query3 =  $this->bdd->prepare($insert3);
    $query1->execute(array( 
                           ":idachat" => 2,
                           ":statut" => 1,
                           ":libelle" => "testt", ));
 $query2->execute(array(  ":idachat" => 2,
                          ":client" => 'ELYSPO12345678901',
                          ":dateI" => $d->format("Y-m-d H:i:s") ));
   $query3->execute(array(  ":produit" => $idproduit,
                             ":idachat" => 2,
  ));
    var_dump($query1->errorInfo());
    var_dump($query2->errorInfo());
    var_dump($query3->errorInfo());
    echo"ekipdddd";
 

  }
 
 
}
   