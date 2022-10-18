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
    Inner join photo on reference_produit=photo.fk_prr 
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
   Inner join photo on reference_produit=photo.fk_prr 
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
function creerPanier($idproduit,$idachat){
  
  $insert1="INSERT INTO `achat`(`id_achat`, `achat_libelle`, `fk_statut`, `prix_total`) VALUES (:idachat,'',1,:idachat)"; 
  $insert2="INSERT INTO `contient`(`fk_ac`, `fk_pr`) VALUES (:idachat,:produit);"; 
  $insert3="INSERT INTO `cree`(`fk_ac`, `fk_cl`, `date`) VALUES (:idachat,:client,:dateI);";

    $d = new DateTime();
    $query1 =  $this->bdd->prepare($insert1);
    $query2 =  $this->bdd->prepare($insert2);
    $query3 =  $this->bdd->prepare($insert3);
   $query1->execute(array(  ":idachat" => $idachat ));
   $query2->execute(array(  ":idachat" => $idachat ,":produit" => $idproduit ));
   $query3->execute(array(  ":idachat" => $idachat ,":client" => 'CLI12345670',  ":dateI" => $d->format("Y-m-d H:i:s") ));
    var_dump($query2->errorInfo());
    var_dump($query3->errorInfo());
    echo"ekipdddd";


  }
  function getNbPanier(){
    $sql = "SELECT count(0) as nbart FROM all5sport.achat 
    Inner join all5sport.produits on fk_pr=reference_produit
    where fk_cl='CLI12345671'
    order by fk_pr;
    ";
  $query =  $this->bdd->prepare($sql);
  $query->execute();
  return $query->fetchAll();

  }
function getPanier(){
    $sql = "SELECT id_achat,fk_statut,prix_total,fk_cl,telephone,reference_produit,libelle_statut,photo,description_produit,cout_unitaire,sum(cout_unitaire) as prix_total FROM achat
    join cree on fk_ac=id_achat
    join client on fk_cl=code_client
    join contient on contient.fk_ac=id_achat
    join produits on contient.fk_pr=produits.reference_produit
    join statut on id_statut=fk_statut
    join photo on produits.reference_produit=photo.fk_prr
    where fk_statut=1
    group by  fk_pr;
    
     ";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
function Deletepanier($idachat){
  
    $delete1 = "DELETE FROM `contient` WHERE fk_ac==:idachat;";
    $delete2=" DELETE FROM `cree` WHERE fk_ac=:idachat;"; 
    $delete3=" DELETE FROM `achat` WHERE id_achat=:idachat; ";
    
        $query1 =  $this->bdd->prepare($delete1);
        $query2 =  $this->bdd->prepare($delete2);
        $query3 =  $this->bdd->prepare($delete3);
        $query1->execute(array(  ":idachat" => $idachat ));
     $query2->execute(array(  ":idachat" => $idachat  ));
       $query3->execute(array(  ":idachat" => $idachat));
        var_dump($query1->errorInfo());
        var_dump($query2->errorInfo());
        var_dump($query3->errorInfo());

    
    
      }
      function Creerachat($idachat){
  
        $update="UPDATE achat
        SET fk_statut = 2
        WHERE id_achat = :idachat;"; 
      
     
          $query1 =  $this->bdd->prepare($update);
         
         $query1->execute(array(  ":idachat" => $idachat ));

          var_dump($query1->errorInfo());
          echo"ekipdddd";
      
      
        }
        function getCommandes(){
          $sql = "SELECT count(0) as nbart FROM all5sport.achat 
          Inner join all5sport.produits on fk_pr=reference_produit
          where fk_cl='CLI12345671'
          order by fk_pr;
          
           ";
          $query =  $this->bdd->prepare($sql);
          $query->execute();
          return $query->fetchAll();
        }
        function getNbCommandes(){
          $sql = "SELECT count(0) as nbart FROM all5sport.achat 
          Inner join all5sport.produits on fk_pr=reference_produit
          where fk_cl='CLI12345671'
          order by fk_pr
          ";
        $query =  $this->bdd->prepare($sql);
        $query->execute();
        return $query->fetchAll();
      
        }
}
   