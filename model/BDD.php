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
  function creerPanier($idproduit,$idpanier){
  
$insert1 = "INSERT INTO panier (id_panier) VALUES (:idpanier);";
$insert2="INSERT INTO `cree`(`fk_pa`,`fk_cl`) VALUES (:idpanier,:client);"; 
$insert3="INSERT INTO contient (fk_pa,fk_pr) VALUES (:idpanier,:produit); ";

    $d = new DateTime();
    $query1 =  $this->bdd->prepare($insert1);
    $query2 =  $this->bdd->prepare($insert2);
    $query3 =  $this->bdd->prepare($insert3);
    $query1->execute(array(  ":idpanier" => $idpanier ));
 $query2->execute(array(  ":idpanier" => $idpanier ,":client" => 'CLI12345671' ));
   $query3->execute(array(  ":idpanier" => $idpanier ,":produit" => $idproduit ));
    var_dump($query1->errorInfo());
    var_dump($query2->errorInfo());
    var_dump($query3->errorInfo());
    echo"ekipdddd";


  }
  function getNbPanier(){
$sql = "SELECT count(fk_cl) as nbart FROM panier
Inner join contient on id_panier=fk_pa
Inner join cree on id_panier=cree.fk_pa;";
$query =  $this->bdd->prepare($sql);
$query->execute();
return $query->fetchAll();

  }
  function getPanier(){
    $sql = "SELECT produits.reference_produit,cout_unitaire,description_produit,quantite_stock_internet,photo,sum(cout_unitaire) as somme_totale 
    from all5sport.panier
    inner join cree on id_panier=fk_pa
    inner join contient on id_panier=contient.fk_pa
    inner join produits on contient.fk_pr=reference_produit
    inner join photo on reference_produit=photo.fk_pr
    group by (contient.fk_pr)
    ;
    
    
     ";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
 
}
   