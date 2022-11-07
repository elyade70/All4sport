
<?php
if (isset ($_GET['codeclient'])) {
    session_start();
    $_SESSION = [
        'email' => $user['email'],
        'tel'=> $user['telephone'],
        'datenaissance'=> $user['date_naissance'],
    'codeclient'=> $user['code_client'], ];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    <link rel="stylesheet" href="../view/styleboutique.css">
<title>BOUTIQUE</title>
</head>
<body>
<nav>
        <a href="../view/index.php" class="logo"><span>A</span>ll4<img src="../view/logo sport.jfif" alt=""><span>S</span>port </a>
        <h1></h1>
        <div class="onglets">
            <ul>
           <li> <button id='onglet'href="../view/index.php">Acceuil</li>
          <li> <button id='onglet'href="../controller/bddproduits.php">Produits</li>
           <li> <button id='onglet'href="#">Services</li>
           <li> <button id='onglet'href="#">Contact</li>
           <li> <button id='onglet' class="rayon" href="#">Rayons</li>
           </ul>
</div>
       
<?php
if (is_array($rayons) || is_object($rayons))
{
foreach ($rayons as $rayon) {
echo' <div class=ray>';
//     echo" <a href='../controller/bddproduits.php?idrayon=".$rayon['id_rayon']."> 
//     <div id='libellerayon' >". $rayon['libelle_rayon']."</div>";
//     echo"</a>";


    echo"   <a href='../controller/bddproduits.php?idrayon=".$rayon['id_rayon']." '   >
    <div id='libellerayon'> ". $rayon['libelle_rayon']."</div>
    </a>" ;

echo'</div>';
echo'</div>';

}}
?>
           


<?php

    echo"<div id='tete'>";



echo " <a href='../controller/paniercontroller.php'>";
echo"<div id='panier'>";
if (is_array($nbpaniers) || is_object($nbpaniers))
{
foreach ($nbpaniers as $nbpanier) {
echo"<div id='nbarticle'> " .$nbpanier['nbart'] ." </div>";
}
}
echo"<span class='fa fa-shopping-basket fa-5x'></span>";
echo"<p>Mon panier </p>";
echo"</div>";
echo"</a>";



echo " <a href='../controller/commandesproduits.php'>";
echo"<div id='commandes'>";

if (is_array($nbcommandes) || is_object($nbcommandes))
{
foreach ($nbcommandes as $nbcommande) {
echo"<div id='nbarticle'> " .$nbcommande['nbart'] ." </div>";

}}
echo" <span class='fa fa-folder fa-5x'></span>";
echo"<p>Mes commandes  </p>";
echo"</div>";
echo"</a>";

echo"<div id='user'>";

echo"<div id='user'> " .$_SESSION['codeclient'] ." </div>";

echo" <span class='fa fa-user fa-5x'></span>";
echo"<p>User</p>";
echo"</div>";
echo"</div>";



?>
        </div>
    </nav>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

$( ".rayon").mouseover(function() {
  $( ".ray" ).css("display","block");
          });
          $( ".ray").mouseout(function() {
  $( ".ray" ).css("display","none");
          });
</script>
    <style>


#panier {
    width: 100px;

    color:black;
}
#tete{
display:flex;
background-color:#EFCA08;
justify-content: space-between;
width:1300px;
margin-left:950px;

    }
    #commandes{
        width: 100px;
    color:black;
    }
    #nbarticle{
    font-size:40px;
    color:blue;
    margin-left:60px;
    }
#onglet{
    border:1px solid black;
    background-color:#EFCA08;
    border-radius:1px;
    color:black;
    width:120px;
}
ul{
    display:flex;
    justify-content:space-between;
    width:1250px;
    height:30px;
    margin-right:400px;
}
#libellerayon{
    margin-left:1150px;
    border:1px solid black;
    width:90px;
    color:black;
    background-color:white;



    
}
.ray{

    display:none;
}

#user{
color:black;
margin-bottom :30px;

}
    </style>