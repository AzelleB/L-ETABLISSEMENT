 <html>
<head>
   <meta charset="utf-8"/>
   <link rel="stylesheet"  href="sty.css" />
  <title>ETABLISSEMENT</title>
  </head>
  <body>
    <h1>Donnez votre avis</h1>
<blockquote> Pour donner votre avis, vous devez renseigner : </blockquote>
</br>

    <form action="retouravis.php" method="POST">
      Votre nom: 
</br>
</br>
<input type="text" name="name"/>
</br>
</br>
	  Votre école:
</br>
</br>
	  <form method="GET" action="ecole.php">
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
</br>

<p>Nom de votre établissement : </p> 
<input type="text" name="descr"/>
</br>
</br>
      Le commentaire que vous souhaitez faire : 
	  </br>
	  </br>
      <textarea rows="10" cols="80"></textarea>
	  </br>
	  </br>
      <input type="submit" name="submit" value="Valider mon avis"/>
    </form>
  </body>
</html>