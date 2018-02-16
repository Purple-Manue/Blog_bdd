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
	$categorie = $_POST['categorie'];
	$lien = "";
	$image = "";
	$texte = $_POST['texte'];

	if ($cpt == sizeof($array) && $error > 0) {

		echo	"<script type=\"text/javascript\">
					window.alert('veuillez remplir toute les champs pour envoyer le formulaire');
					window.location.href = 'formulaire_ajout_article.php?var=$key&mail=$mail&nom=$nom&prenom=$prenom&titre=$titre';
					</script>";
			exit;

	}else if ($cpt == sizeof($array) && $error == 0){
		$bdd = mySqli();
		$id_auteur = ajoutAuteur($bdd, $nom, $prenom, $mail);
		ajoutArticle($bdd, $categorie, $id_auteur, $titre, $texte, $lien, $image);

		echo	"<script type=\"text/javascript\">
					window.alert('formulaire valide !');
					window.location.href = 'formulaire_ajout_article.php';
					</script>";
			exit;

	}
?>
