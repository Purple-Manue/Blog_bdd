<?php include 'myFunction.php' ?>

<html>
  <head>
	   <?php include 'header.php'; ?>
		 <title>Résultat de recherche</title>
 	</head>

 	<body>
 		<section class="container-fluid">
 			<div class="container">
 				<div class="row">
 					<h1 class="col-12 text-center">MY ARTICLE</h1>
	 			</div>
				<div class="col-6 col-sm-12 col-md-12 col-lg-6">
					<form class="barrerecherche" action="barrerecherche.php" method="get">
						<input type="search" name="recherche" placeholder="Recherche..." />
						<input type="submit" name="" value="Valider">
					</form>
				</div>
	 			<div class="row">
	 				<div class="col-12 text-center">BLOG D'ARTICLE</div>
	 			</div>
 			</div>

 		</section>
 		<section class="container-fluid">

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="formulaire_ajout_article.php">New article <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
							<div class="dropdown-menu" aria-labelledby="dropdown08">
								<a class="dropdown-item" value="article" href="tousLesArticles.php">tous les articles</a>
								<?php
									$bdd = mySqli();
									$gdata = categorie($bdd);
									while ($grep = $gdata->fetch()){ ?>
										<a class="dropdown-item" href="filtre.php?nom=<?php echo $grep['nom'] ?>"><?php echo $grep['nom']?></a>
								<?php } ?>
							</div>
						</li>
					</ul>
				</div>
			</nav>
 		</section>
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
