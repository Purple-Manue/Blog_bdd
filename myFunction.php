<?php

	function mySqli(){
		try{

    		$bdd = new PDO('mysql:host=localhost;dbname=BDD_BLOG;charset=utf8', 'purple', 'Alchimie12');
    		return $bdd;
		}
		catch(Exception $e){

        	die('Erreur : '.$e->getMessage());
		}

  	die('Erreur : '.$e->getMessage());
		}

	function id_auteur($bdd, $mail){
		try {
			$reponse = $bdd->prepare("SELECT * FROM Auteur WHERE mail = '".$mail."'");
			$reponse->execute();
			$row = $reponse->fetch();
			$id_auteur = $row['id'];
			return $id_auteur;
		}catch (Exception $e) {
    		die("Oh noes! There's an error in the query!");
		}
	}

	function id_categorie($bdd, $categorie){
		try{
			$reponse = $bdd->prepare("SELECT id FROM Auteur WHERE nom = '".$categorie."'");
			$reponse->execute();
			$row = $reponse->fetch();
			$id_categorie = $row['id'];
			return $id_categorie;
		}catch (Exception $e) {
    		die("Oh noes! There's an error in the query categire! ($categorie)".$e);
		}
	}

	function ajoutAuteur($bdd, $nom, $prenom, $mail){
		$req = $bdd->prepare('INSERT INTO Auteur (nom, prenom, mail) VALUES(?,?,?)');
		$req->execute(array($nom, $prenom, $mail));
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $bdd->lastInsertId();
	}

	function ajoutArticle($bdd, $id_categorie, $id_auteur, $titre, $texte, $lien, $image){
		$req = $bdd->prepare('INSERT INTO Article (id_categorie, id_auteur, titre, texte, lien, image)
				VALUES (?,?,?,?,?,?)');
		$req->execute(array($id_categorie, $id_auteur, $titre, $texte, $lien, $image));
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	function categorie($bdd){
		$req = $bdd->query('SELECT * FROM Categorie');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $req;
	}

	function lesArticles($bdd){
		try{
			$req = $bdd->query("SELECT *
								FROM Auteur
								INNER JOIN Article ON Auteur.id = Article.id_auteur
								INNER JOIN Categorie ON Categorie.id = Article.id_categorie
								LIMIT 10");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $req;
		}catch (Exception $e) {
			die("Oh noes! There's an error in the query categorie! ($categorie)");
		}
	}

	function touslesArticles($bdd){
		try{
			$req = $bdd->query("SELECT Auteur.nom AS nom_auteur, Article.titre AS titre, Article.texte AS texte, Article.date AS date, Categorie.nom AS nom_categorie
								FROM Auteur
								INNER JOIN Article ON Auteur.id = Article.id_auteur
								INNER JOIN Categorie ON Categorie.id = Article.id_categorie");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $req;
		}catch (Exception $e) {
			die("Oh noes! There's an error in the query categorie! ($categorie)");
		}
	}

	function media($bdd){
		try{
			$req = $bdd->query("SELECT Article.titre AS titre, Article.texte AS texte
								FROM Auteur
								INNER JOIN Article ON Auteur.id = Article.id_auteur
								INNER JOIN Categorie ON Categorie.id = Article.id_categorie
								WHERE Categorie.nom = 'media';
								LIMIT 10");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $req;
		}catch (Exception $e) {
			die("Oh noes! There's an error in the query categorie! ($categorie)");
		}
	}

	function technologie($bdd){
		try{
			$req = $bdd->query("SELECT Article.titre AS titre, Article.texte AS texte
								FROM Auteur
								INNER JOIN Article ON Auteur.id = Article.id_auteur
								INNER JOIN Categorie ON Categorie.id = Article.id_categorie
								WHERE Categorie.nom = 'technologie';
								LIMIT 10");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $req;
		}catch (Exception $e) {
			die("Oh noes! There's an error in the query categorie! ($categorie)");
		}
	}

	function sport($bdd){
		try{
			$req = $bdd->query("SELECT Article.titre AS titre, Article.texte AS texte
								FROM Auteur
								INNER JOIN Article ON Auteur.id = Article.id_auteur
								INNER JOIN Categorie ON Categorie.id = Article.id_categorie
								WHERE Categorie.nom = 'sport';
								LIMIT 10");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $req;
		}catch (Exception $e) {
			die("Oh noes! There's an error in the query categorie! ($categorie)");
		}
	}

	function travail($bdd){
		try{
			$req = $bdd->query("SELECT Article.titre AS titre, Article.texte AS texte
								FROM Auteur
								INNER JOIN Article ON Auteur.id = Article.id_auteur
								INNER JOIN Categorie ON Categorie.id = Article.id_categorie
								WHERE Categorie.nom = 'travail';
								LIMIT 10");
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $req;
		}catch (Exception $e) {

			die("Oh noes! There's an error in the query categorie! ($categorie)");
		}
	}

?>
