<html> 
  <head>
       <meta charset="utf-8"/>
   <link rel="stylesheet"  href="sty.css" />
    <title>Rappel HTML et CSS</title>
  </head>
  <body>
    <h1>Prise en compte de votre avis</h1>

    <p>
      <a href="avis.php">Donner un autre avis</a>
    </p>

<?php 
if(ISSET($_POST['name']) AND ISSET($_POST['Type']) AND ISSET($_POST['descr'])AND ISSET($_POST['review'])){
	$SQL = new SQLite3('review.db');
	$ajout = 'INSERT INTO REVIEWS("NAME","TYPE","DESCR", "REVIEW") VALUES ("'.$_POST["name"].'",'.$_POST["Type"].','.$_POST["descr"].',"'.$_POST["review"].'")';
	$SQL->exec($ajout);
	
	echo "<p>";
	echo "Votre nom et votre commentaire ont été ajoutés. <br/>";
}
else{
	echo "Il y a un problème au niveau de votre commentaire.";
}
?>
  </body>
</html>
