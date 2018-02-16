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
						<a href="<?php echo $_SERVER["HTTP_REFERER"];?>" style="color:grey;"<i class="far fa-arrow-alt-circle-left fa-3x"></i></a>
						<li class="nav-item active">
							<a class="nav-link" href="formulaire_ajout_article.php">New article <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
							<div class="dropdown-menu" aria-labelledby="dropdown08">
								<a class="dropdown-item" value="article" href="tousLesArticles.php">tous les articles</a>
								<?php $bdd = mySqli();
									$gdata = categorie($bdd);
									while ($grep = $gdata->fetch()){ ?>
										<a class="dropdown-item" href="filtre.php?nom=<?php echo $grep['nom'] ?>"><?php echo $grep['nom']?></a>
								<?php } ?>
							</div>
						</li>
					</ul>
					<form class="form-inline my-2 my-md-0 barrerecherche" action="barrerecherche.php" method="get">
            			<input class="form-control" type="text" placeholder="Search" aria-label="Search" name="recherche">
          			</form>
				</div>
			</nav>
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
						<li class="page-item"><a class="page-link" href="index.php?page=1">1</a></li>
						<li class="page-item"><a class="page-link" href="index.php?page=2">2</a></li>
						<li class="page-item"><a class="page-link" href="index.php?page=3">3</a></li>
						<li class="page-item">
							<a class="page-link" href="index.php?page=<?php if ((intval($_GET['page'])+1) > 3) { echo '3'; } else echo intval($_GET['page'])+1 ; ?> " aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
 			</div>
 		</section>

 		<!-- href="<?php //echo $_SERVER["HTTP_REFERER"]; ?>" -->
