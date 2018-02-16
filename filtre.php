<?php include 'myFunction.php' ?>

<html>
	<head>
		<?php include 'header.php'; ?>
		<title>Page Accueil</title>
 	</head>

 	<body>
 		<section class="container-fluid">
 			<div class="container">
 				<div class="row">
 					<h1 class="col-12 text-center">MY ARTICLE</h1>
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
							<a class="nav-link" href="index.php?page=1">Acceuil <span class="sr-only">(current)</span></a>
						</li>
					</ul>
				</div>
			</nav>
 		</section>

 		<section class="container-fluid">
 			<div class="container">
				<?php
					if (isset($_GET['nom'])) { ?>
						<div class="row">
							<h1 class=" col-12 text-center"><?php echo $_GET['nom']; ?></h1>
						</div>
						<div class="row">
							<?php 
								$bdd = mySqli();
								$req = filtre($bdd, $_GET['nom']);
								while ($donnees = $req->fetch()){ ?>
									<div class="col-sm-12 col-md-6">
										<a href="article.php?id=<?php echo $donnees['id_article'] ?>">
											<h2 class="text-center"> <?php echo $donnees['titre']; ?> </h2>
										</a>
										<p>
											<?php echo substr($donnees['texte'],0,100)."..."; ?>
										</p>
										<p>
											Auteur : <?php echo $donnees['nom_auteur']?> </br>
											Mail : <?php echo $donnees['mail']?> </br>
											Date et heure publication :  <?php echo $donnees['date']?> </br>
											Nom Categorie : <?php echo $donnees['nom_categorie'] ?>
										</p>
									</div>
								<?php } ?>
						</div>
				<?php } ?>
			</div>
		</section>
	</body>
</html>