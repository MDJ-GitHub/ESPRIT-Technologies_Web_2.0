<?PHP 

include 'Club.php';

	if ( (empty($_POST['id'])) || (empty($_POST['nom'])) || (empty($_POST['description'])) || (empty($_POST['adresse'])) || (empty($_POST['domaine'])) ) {
    echo "Champs manquants " ;
} else {



$club1=new Club($_POST['id'],$_POST['nom'],$_POST['description'],$_POST['adresse'],$_POST['domaine']);
var_dump($club1);

}
?>