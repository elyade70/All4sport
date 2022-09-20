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


    $sql = "SELECT * FROM client";
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
<table>

<thead>
<th>code client</th>
<th>adresse</th>
<th>email</th>
<th>telephone</th>
<th>date de naissance</th>
</thead>
<tbody>
<tr>


<?php
if (is_array($res) || is_object($res))
{
    foreach ($res as $client ) {

echo "<tr>";
echo "<td>".$client["code_client"]."</td>";
echo "<td>".$client["adresse"]."</td>";
echo "<td>".$client["email"]."</td>";
echo "<td>".$client["telephone"]."</td>";
echo "<td>".$client["date_naissance"]."</td>";

echo"</tr>";
}
    }

 ?>
</tr>
</tbody>
</table>
</html>

</html>