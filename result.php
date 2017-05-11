<html>
<head>
   <meta charset="utf-8"/>
   <link rel="stylesheet"  href="st.css" />
     <title>Ecole trouvées</title>
</head>
<body>
</br>
<h1>Voici la liste des établissements correspondants à votre recherche :</h1>
</br>
<form action="avis2.php" method="POST">
<table>
<tr><th>Type</th><th>Nom</th><th>Public/Privé</th><th>Adresse</th><th>Ville</th>
<th><input type="submit" value='Donner un avis'/></th>
</tr>
<?php
if (array_key_exists('Type', $_GET)) {
    $Type=$_GET['Type'];
} else {
    $Type=NULL;
}

if (array_key_exists('descr', $_GET)) {
    $description=$_GET['descr'];
} else{
    $description=NULL;
}

if (array_key_exists('offset', $_GET)) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

$query = 'SELECT "Type", "Appelation", "PP", "Adresse", "Ville", "CP"'.
    'FROM etablissement WHERE 1 ';
    
if ($Type) {
    $query = $query . 'AND "Type" = \'' . $Type . '\' ' ;
}

if ($description) {
    $query = $query . 'AND ( "CP" LIKE \'%' . $description . '%\' ' .
        'OR "Ville" LIKE \'%' . $description . '%\') ';
}

$query = $query . "LIMIT 10 " . "OFFSET " . $offset ;

#echo $query;

$base = new SQLite3('DATA.db');
$results = $base->query($query);

while ($row = $results->fetchArray()) {
	$Type = $row[0];
    echo "<tr>";
	echo "<td>",$Type,"</td>";
    echo "<td>",$row[1],"</td>";
    echo "<td>",$row[2],"</td>";
    echo "<td>",$row[3],"</td>";
	echo "<td>",$row[4],"</td>";
    echo "<td><input type='radio' name='id' value='",$row[5],"'/></td>";
    echo "</tr>\n";
}

?>
</table>
</form>
<?php
echo "<a href='result.php?";
if ($Type) {
    echo 'Type=',$Type,'&';
}
if ($description) {
    echo 'descr=',$description,'&';
}
echo 'offset=', intval($offset) - 10;
echo "'>&lt;&lt;</a>";

echo "<a href='result.php?";
if ($Type) {
    echo 'Type=',$Type,'&';
}
if ($description) {
    echo 'descr=',$description,'&';
}
echo 'offset=', intval($offset) + 10;
echo "'>&gt;&gt;</a>";
?>
<blockquote>Sélectionnez l'établissement de votre choix et découvrez ainsi les avis donnés sur celui-ci </blockquote>
</body>
</html>