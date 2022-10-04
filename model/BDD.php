<?php
class Bdd
{
  private $bdd;


   function __construct(){

    $dsn = 'mysql:dbname=all4sport;host=127.0.0.1';
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
    $sql = "SELECT * FROM produits"; 
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  function GetOneProduit($id){
   $sql= "SELECT * FROM `produits` WHERE reference_produit= '$id'";
   $query = $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
    echo"ekip";
    header("Location: ../controller/bddproduits.php?id=$id");
    // header("Refresh:0");
   // header("Location: ../controller/bddproduits.php?id=$id" );
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
 
 
}
   