<?php include 'myFunction.php' ?>
<html>
  <head>
	   <?php include 'header.php'; ?>
		 <title>Page Accueil</title>
 	</head>

 	<body>
 		<?php include 'navbar.php' ?>
 		<section class="container-fluid">
 			<div class="container">
				<div class="row">
					<?php
						$bdd = mySqli();
						$articleParPage = 10;
						$nb_article = nb_article($bdd);
						$pageTotales = ceil($nb_article/$articleParPage);
						if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0) {
							
							$_GET['page'] = intval($_GET['page']);
							$pageCourante = $_GET['page'];
						}else {
							$pageCourante = 1;
						}
						$depart = ($pageCourante-1)*$articleParPage;

						$req = lesArticles($bdd, $depart, $articleParPage);

							while ($donnees = $req->fetch()) { ?>
								<div class="col-sm-12 col-md-6 ">
									<h1 class="text-center"><?php echo $donnees['nom_categorie']; ?> </h1>
									<a href="article.php?id=<?php echo $donnees['id_article']; ?>">
										<h2> <?php echo $donnees['titre']; ?> </h2>
									</a>
									<div class="bloc-article">
										<?php echo $donnees['texte']; ?>
									</div>
									<div>
										<p>Auteur : <?php echo $donnees['nom_auteur']?> </p>
										<p>Mail : <?php echo $donnees['mail']?> </p>
										<p>Date et heure publication :  <?php echo $donnees['date']?> </p> 
									</div>
								</div>
					<?php } ?>
				</div>
 			</div>
 		</section>
 		<section class="container">
 			<div class="row">
 				<nav aria-label="Page navigation example" class="col-sm-6 offset-sm-3 col-lg-md offset-md-5">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="index.php?page=<?php if ((intval($_GET['page'])-1) < 1) { echo '1'; } else echo intval($_GET['page'])-1 ; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php 
							for ($i=1; $i <= $pageTotales ; $i++) { ?>
								<li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i ?>"> <?php echo $i ?></a></li>
						<?php } ?>
						<li>
							<a class="page-link" href="index.php?page=<?php if ((intval($_GET['page'])+1) > $pageTotales) { echo $pageTotales; } else echo intval($_GET['page'])+1 ; ?> " aria-label="Next">
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

