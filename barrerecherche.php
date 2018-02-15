<?php include 'myFunction.php' ?>

<html>
  <head>
	   <?php include 'header.php'; ?>
		 <title>Résultat de recherche</title>
 	</head>

 	<body>
 		<?php include 'navbar.php' ?>

 		<section class="container-fluid">
 			<div class="container">
				<div class="row">
					<?php
						
						$req = barrerecherche($bdd,  $_GET['recherche']);
						while ($donnees = $req->fetch()){ ?>
							<div class="col-sm-12 col-md-6">
								<a href="article.php?id=<?php echo $donnees['id_article'] ?>">
									<h2> <?php echo $donnees['titre']; ?> </h2>
								</a>
								<p>
									<?php echo substr($donnees['texte'],0,100)."..."; ?>
								</p>
								<p>
									Nom Categorie : <?php echo $donnees['nom_categorie'] ?>
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
