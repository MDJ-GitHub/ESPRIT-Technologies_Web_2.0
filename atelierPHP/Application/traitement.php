
<?PHP 
	if ( (empty($_GET['id'])) || (empty($_GET['nom'])) || (empty($_GET['description'])) || (empty($_GET['adresse'])) || (empty($_GET['domaine'])) ) {
    echo "Champs manquants " ;
} else {
	


echo "<table border='2'>" ;
echo "<tr>" ;
echo "<td>Id</td>" ;
echo "<td>Nom</td>" ;
echo "<td>Description</td>" ;
echo "<td>Adresse</td>" ;
echo "<td>Domaine</td>" ;
echo "</tr>" ;
	echo "<tr>" ;
	echo "<td>" . $_GET['id'] . "</td>" ;
	echo "<td>" . $_GET['nom'] . "</td>" ;
	echo "<td>" . $_GET['description'] . "</td>" ;
	echo "<td>" . $_GET['adresse'] . "</td>" ;
	echo "<td>" . $_GET['domaine'] . "</td>" ;
	}
	?>
	