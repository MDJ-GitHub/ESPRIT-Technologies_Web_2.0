<?php
class config {
private static $instance = NULL;
public static function getConnexion() {

if (!isset(self::$instance)) {
self::$instance = new PDO('mysql:host=localhost;dbname=clubEsprit', 'root', '');
}
return self::$instance;
} 

public function afficherClubs() {
try {
    $dbh = new PDO('mysql:host=localhost;dbname=clubEsprit', 'root', '');
    foreach($dbh->query('SELECT * from Club') as $row) {
			echo "<tr>" ;
	echo "<td>" . $row['id'] . "</td>" ;
	echo "<td>" . $row['nom'] . "</td>" ;
	echo "<td>" . $row['description'] . "</td>" ;
	echo "<td>" . $row['adresse'] . "</td>" ;
	echo "<td>" . $row['domaine'] . "</td>" ;
		echo "</tr>" ;
  
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
	
}
}


?>

<?php

$club=new config() ;

echo "<table border='2'>" ;
echo "<tr>" ;
echo "<td>Id</td>" ;
echo "<td>Nom</td>" ;
echo "<td>Description</td>" ;
echo "<td>Adresse</td>" ;
echo "<td>Domaine</td>" ;
echo "</tr>" ;

$club->afficherClubs();



?>