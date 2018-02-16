<?php include 'myFunction.php' ?>

<html>
    <head>
	  	<?php include 'header.php'; ?>
 	</head>
 	<body id="demo">
 		<?php include 'navbar.php' ?>
 		<section class="container-fluid">
 			<div class="container">
				<div class="row">
					<?php $bdd = mySqli();
						$req = touslesArticles($bdd);
						while ($donnees = $req->fetch()){ ?>
							<div class="col-sm-12 col-md-6 bloc-article">
								<h1 class="text-center"><?php echo $donnees['nom_categorie'] ?> </h1>
								<a href="article.php?id=<?php echo $donnees['id_article'] ?>">
									<h2> <?php echo $donnees['titre']; ?> </h2>
								</a>
								<p>
									<?php echo substr($donnees['texte'],0,100)."..."; ?>
								</p>
								<p>
									Auteur : <?php echo $donnees['nom_auteur']?> </br>
									Mail : <?php echo $donnees['mail']?> </br>
									Date et heure publication :  <?php echo $donnees['date']?> </br>
								</p>
							</div>
 
					<?php } ?>
				</div>
 			</div>
 		</section>

 	</body>
</html>

