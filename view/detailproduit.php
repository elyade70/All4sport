<?php
include "../View/header.php"
?>
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
<table>

<thead>
<th>reference_produit</th>
<th>nom fournisseur</th>
<th>cout unitaire</th>
<th>description</th>
<th>stock internet</th>
<th> stock_magasin</th>
<th> lieu stockage</th>
</thead>
<tbody>
<tr>
<?php

$zi="";
if (is_array($produits) || is_object($produits))
{
foreach ($produits as $produit) {

echo "<tr>";
echo "<td>".$produit["reference_produit"]."</td>";
echo "<td>".$produit["nom_fournisseur"]."</td>";
echo "<td>".$produit["cout_unitaire"]."</td>";
echo "<td>".$produit["description"]."</td>";
echo "<td>".$produit["stock_internet"]."</td>";
echo "<td>".$produit["stock_magasin"]."</td>";
echo "<td>".$produit["lieu_stockage"]."</td>";

echo"</tr>";
}}
?>