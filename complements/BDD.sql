DROP TABLE IF EXISTS nutrition;
DROP TABLE IF EXISTS ingredient;
DROP TABLE IF EXISTS etape;
DROP TABLE IF EXISTS recette;
DROP TABLE IF EXISTS news;

CREATE TABLE recette(
    recetteId int NOT NULL REFERENCES cadre(cadreId),
    difficulte TEXT NOT NULL,
    tempsPrep int,
    tempsRep int, 
    tempsCuiss int,
    notation NUMERIC,
    cadre_id int NOT NULL,
    user_id int, 
    PRIMARY KEY (recetteId),
    FOREIGN KEY (user_id) REFERENCES utilisateur(userId)
); 


CREATE TABLE news (
	newsId int NOT NULL REFERENCES cadre(cadreId),
	PRIMARY KEY (newsId)
);


CREATE TABLE ingredient(
	ingId INT NOT NULL AUTO_INCREMENT, 
	pourcentage NUMERIC, 
	nbCalorie NUMERIC, 
	saisonIng varchar(30),
	recette_id INT NOT NULL, 
	PRIMARY KEY(ingId),
	FOREIGN KEY(recette_id) REFERENCES recette(recetteId)
);


CREATE TABLE etape(
	etapeId INT NOT NULL AUTO_INCREMENT,
	descEtape TEXT NOT NULL,
	recette_id INT NOT NULL,
	PRIMARY KEY(etapeId),
	FOREIGN KEY(recette_id) REFERENCES recette(recetteId)
);


CREATE TABLE nutrition(
	nutId INT NOT NULL AUTO_INCREMENT,
	info TEXT NOT NULL, 
	ing_id INT, 
	PRIMARY KEY(nutId),
	FOREIGN KEY(ing_id) REFERENCES ingredient(ingId)
);


CREATE TABLE fete(
	feteId INT NOT NULL REFERENCES recette(recetteId), 
	typeFete varchar(100),
	PRIMARY KEY(feteId)
);


CREATE TABLE saison(
	saisonId INT NOT NULL REFERENCES recette(recetteId), 
	typeSaison varchar(100),
	PRIMARY KEY(saisonId)
);

CREATE TABLE healthy(
	healthyId INT NOT NULL REFERENCES recette(recetteId), 
	seuilCalories NUMERIC,
	PRIMARY KEY(healthyId) 
);



