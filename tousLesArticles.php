<?php include 'myFunction.php' ?>

<html>
    <head>
	  	<?php include 'header.php'; ?>
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
							<a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
							<div class="dropdown-menu" aria-labelledby="dropdown08">
								<?php $bdd = mySqli();
									$gdata = categorie($bdd);
									while ($grep = $gdata->fetch()){ ?>
										<a class="dropdown-item" value="<php echo $gdata['id'] ?>" href=""><?php echo $grep['nom']?></a>
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
					<?php $bdd = mySqli();
						$req = touslesArticles($bdd);
						while ($donnees = $req->fetch()){ ?>
							<div class="col-sm-12 col-md-6">
								<h1>
									<?php echo $donnees['titre']; ?>
								</h1>
								<p>
									<?php echo $donnees['texte']; ?>
								</p>
								<p>
									<?php echo $donnees['nom_auteur'] ?>
								</p>
								<p>
									<?php echo $donnees['nom_categorie'] ?>
								</p>
								<p>
									<?php echo $donnees['date'] ?>
								</p>
							</div>

						<?php } ?>
				</div>
 			</div>
 		</section>

 	</body>
</html>
