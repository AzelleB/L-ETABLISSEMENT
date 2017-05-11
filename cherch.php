<html>
<head>
   <meta charset="utf-8"/>
   <link rel="stylesheet"  href="affich.css" />
     <title>ETABLISSEMENT</title>
</head>
<body>

<h1>A la recherche de l'établissement idéal :</h1>

<blockquote> En tant que parent, on souhaite toujours offrir à son enfant la meilleure éducation possible. Pour vous aider, notre site vous permet de trouver l'établissement idéal en sélectionnant une catégorie d'établissement et en indiquant une ville ou un codepostal pour affiner la recherche. </blockquote>
<form method="GET" action="result.php">
<select name="Type">
<option value="Type" selected></option>
<?php
$base = new SQLite3('DATA.db');
$results = $base->query(
    'SELECT DISTINCT "Type", "Type" FROM etablissement ORDER BY "Type"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[1],"'>", $row[0], "</option>\n";
    }
}
?>
</select>
<br/>

<p>Ville / Code Postal : </p> 
<input type="text" name="descr"/>
</br>
</br>
<input type="submit" name="Go" value="Trouve mon école"/>
</form>
</body>
</html>


