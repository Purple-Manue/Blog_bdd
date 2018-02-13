<?php include 'myFunction.php' ?>
<?php
	$array = array("mail" => $_POST['mail'], "nom" => $_POST['nom'], "prenom" => $_POST['prenom'], "titre" => $_POST['titre']);
	$cpt = 0;
	$error = 0;
	foreach ($array as $key => $value) {
		$cpt++;
		if($value == NULL){
			$error++;
		}
	}
	$mail = $_POST['mail'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$titre = $_POST['titre'];
	$date = date("y-m-d");
	if ($cpt == sizeof($array) && $error > 0) {

		echo	"<script type=\"text/javascript\">
					window.alert('veuillez remplir toute les champs pour envoyer le formulaire');
					window.location.href = 'formulaire_ajout_article.php?var=$key&mail=$mail&nom=$nom&prenom=$prenom&titre=$titre';
					</script>";
			exit;
	}else if ($cpt == sizeof($array) && $error == 0){
		$bdd = mySqli();
		$req = $bdd->prepare('INSERT INTO Auteur (nom, prenom, mail) VALUES(?,?,?)');
		$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['mail']));
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo	"<script type=\"text/javascript\">
					window.alert('formulaire valide !');
					window.location.href = 'formulaire_ajout_article.php';
					</script>";
			exit;
	}
	function afficherunarticle ()


	function article($bdd, $id) {
		$unarticle = mysqli_query($bdd,
			"SELECT Auteur.nom as anom, titre, texte, date, lien,	Categorie.nom as cnom
			FROM Article
			LEFT JOIN Auteur ON Auteur.id = Article.id_auteur
			LEFT JOIN Categorie ON Categorie.id = Article.id_categorie
			WHERE Article.id='$id'");

		return($unarticle);
	}
?>
