<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\controller\rayon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Page d'accueil</title>
</head>
<body>
<nav>

<a href="#" class="logo"><span>A</span>ll4<img src="..\controller\logo sport.jfif" alt=""><span>S</span>port </a>
<h1></h1>
<div class="onglets">
    <a href="#acceuil">Accueil</a>
    <a href="#presentation">Presentation</a>
    <a href="#produits">Produits</a>
    <a href="#services">Services</a>
    <a href="#contact">Contact</a>
</div>

</nav>
<div class="rayon">
<button  id="rayonn">Rayon</button>
<i class="fa fa-eye"></i>
<i class="fa fa-eye-slash" style="display:none;"></i>
</div>
 
<?php

function getConnexion(){
    $dsn = 'mysql:dbname=all4sport;host=127.0.0.1';
    try {
        $bdd = new PDO($dsn, "root", "");
        return $bdd;
    }catch (Exception $e){
        die ('DB Error : '.$e->getMessage());
    }
}


    $sql = "SELECT rayon_libelle FROM rayon";
    $bdd = getConnexion();
    $query = $bdd->prepare($sql);
    $query->execute();
    $res = $query->fetchAll();




?>
<html>
<html>
    
<style>
table{
  border: 2px
  solid black;

}
th{
  border: 1px
  solid black;
}
tr{
  border: 2px
  solid black;
}
</style>
<table id="ekip">

<thead>
<th>id photo</th>
<th>description</th>
<th>photo</th>

</thead>
<tbody>
<tr>


<?php
if (is_array($res) || is_object($res))
{
    foreach ($res as $client ) {

echo "<tr>";
echo "<td>".$client["rayon_libelle"]."</td>";

echo"</tr>";
}
    }

 ?>
</tr>
</tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script >
  $( ".fa-eye").click(function() {

$('#ekip').css("display","none");
$('.fa-eye').css("display","none");
$('.fa-eye-slash').css("display","block");
  });
  $( ".fa-eye-slash").click(function() {

$('#ekip').css("display","block");
$('.fa-eye').css("display","block");
$('.fa-eye-slash').css("display","none");
  });
</script>
</html>

</html>