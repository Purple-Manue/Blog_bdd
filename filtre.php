<?php include 'myFunction.php' ?>

<html>
	<head>
		<?php include 'header.php'; ?>
		<title>Résultat tous les articles page d'accueil</title>
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
							<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" style="color:grey;">
								<i class="far fa-arrow-alt-circle-left fa-3x"></i>
							</a>
						</li>
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
					$bdd = mySqli();
					$articleParPage = 10;

					if (isset($_GET['nom']) and !empty($_GET['nom'])) { ?>

						<div class="row">
							<h1 class=" col-12 text-center"><?php echo $_GET['nom']; ?></h1>
						</div>
						<div class="row">

							<?php	
								$nb_article = nb_article_categorie($bdd, $_GET['nom']);
								$pageTotales = ceil($nb_article/$articleParPage);

								if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0) {
								
									$_GET['page'] = intval($_GET['page']);
									$pageCourante = $_GET['page'];

								}else {
									$pageCourante = 1;
								}
								$depart = ($pageCourante-1)*$articleParPage;
								$req = filtre($bdd, $_GET['nom'], $depart, $articleParPage);

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
		<section class="container">
 			<div class="row">
 				<nav aria-label="Page navigation example" class="col-sm-6 offset-sm-3 col-lg-md offset-md-5">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="filtre.php?page=<?php if ((intval($_GET['page'])-1) < 1) { echo '1'; } else echo intval($_GET['page'])-1 ; ?>&nom=<?php echo $_GET['nom']?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php 
							for ($i=1; $i <= $pageTotales ; $i++) { ?>
								<li class="page-item"><a class="page-link" href="filtre.php?page=<?php echo $i ?>&nom=<?php echo $_GET['nom']?>"> <?php echo $i ?></a></li>
						<?php } ?>
						<li>
							<a class="page-link" href="filtre.php?page=<?php if ((intval($_GET['page'])+1) > $pageTotales) { echo $pageTotales; } else echo intval($_GET['page'])+1 ; ?>&nom=<?php echo $_GET['nom']?> " aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
 			</div>
 		</section>
	</body>
</html>
