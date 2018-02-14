----- Afficher pour chaque auteur les noms de ses categorie -----

SELECT Auteur.nom, Categorie.nom
FROM  Auteur
INNER JOIN `Categorie` ON Categorie.nom = Auteur.nom

----- Afficher tous les auteurs avec les articles par catégorie.

SELECT *
FROM Auteur
INNER JOIN Article ON Auteur.id = Article.id_auteur
INNER JOIN Categorie ON Article.id_categorie = Categorie.id
GROUP BY Categorie.nom
