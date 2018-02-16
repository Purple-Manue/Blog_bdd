<?php include 'myFunction.php';
if (isset($_GET['nom'])) {
  $nom =  $_GET['nom'];
} else $nom = "";
if (isset($_GET['prenom'])) {
  $prenom =  $_GET['prenom'];
} else $prenom = "";
if (isset($_GET['mail'])) {
  $mail =  $_GET['mail'];
} else $mail = "";
if (isset($_GET['titre'])) {
  $titre =  $_GET['titre'];
} else $titre = "";
?>
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
 			<div class="">
 				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
							</li>
						</ul>
					</div>
				</nav>
 			</div>
 		</section>
 		<section class="container-fluid">
 			<div>
 				<form method="POST" action="request.php" class="col-6 offset-3" enctype="multipart/form-data">
 					<div class="row">
 						<span class="form-group col-sm-12 col-md-6 text-left">
					    	<label>Nom</label>
					    	<input type="text" class="form-control" aria-describedby="emailHelp" name="nom" value="<?php print $nom; ?>">
						</span>
						<span class="form-group col-sm-12 col-md-6 text-left">
					    	<label>Prénom</label>
					    	<input type="text" class="form-control" aria-describedby="emailHelp" name="prenom" value="<?php print $prenom; ?>">
						</span>
 					</div>
 					<div class="row">
 						<span class="form-group col-sm-12 col-md-6 text-left">
					    	<label>E-mail</label>
					    	<input type="email" class="form-control" aria-describedby="emailHelp" name="mail" value="<?php print $mail; ?>">
						</span>
						<span class="form-group col-sm-12 col-md-6 text-left">
					    	<label>Titre</label>
					    	<input type="text" class="form-control" aria-describedby="emailHelp" name="titre" value="<?php print $titre; ?>">
						</span>
 					</div>
 					<div class="row">
 						<span class="form-group col-sm-12 col-md-6">
 							<label>Catégorie</label>
 							<select  name="categorie" class="form-control">
								<?php $bdd = mySqli();
									$grep = categorie($bdd);
	    							while ($gdata = $grep->fetch()){ ?>
										<option class="text-center" value="<?php echo $gdata['id'] ?>"><?php echo $gdata['nom']?></option>
								<?php } ?>
							</select>
 						</span>
 						<div class="form-group col-sm-12 col-md-6">
						    <label for="exampleInputFile">File input</label>
						    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="file">
						    <small id="fileHelp" class="form-text text-muted">chargez une photo</small>
						</div>
 					</div>
 					<div class="row">
 						<span class="form-group col-12 text-left">
					    	<label>Texte </label>
					    	<textarea class="form-control ckeditor" rows="25" name="texte"></textarea>
						</span>
 					</div>
 					<div class="row">
						<button type="submit" class="btn btn-primary col-2 offset-9">Enregistrer</button>
					</div>
 				</form>
 			</div>
 		</section>
 	</body>
</html>
