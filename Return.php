<html>
<head>
	<meta charset="utf-8"/>
		<title>Objets plus disponibles</title>
</head>
<body>
<h1>Objets plus disponibles</h1>
<?php
if (!array_key_exists('Type',$_POST)){
	echo "<p>Tu n'as rien selectionné !</p>";
} else {
	$ref=$_POST['Type'];
	$delete = 'DELETE FROM monuments WHERE "REF" = \'' . $ref . '\'';
	$db = new SQLite3('DATA.db');
	$results = $db->exec($delete);
	echo "<p>L'objet est supprimé de la base !</p>";
}
?></body>
<html>