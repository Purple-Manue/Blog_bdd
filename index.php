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
							<a class="nav-link" href="formulaire_ajout_article.php">New article <span class="sr-only">(current)</span></a>
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
				<div class="col-sm-12 col-md-6">
					<?php
						$bdd = mySqli();
						$req = lesArticles($bdd);
						while ($donnees = $req->fetch()) { ?>
						<h1>

						</h1>
						}
					?>
				</div>
 			</div>
 		</section>

 	</body>
</html>
