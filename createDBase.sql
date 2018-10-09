DROP DATABASE IF EXISTS tpGallino;
CREATE DATABASE tpGallino CHARACTER SET utf8 COLLATE utf8_general_ci;
USE tpGallino;

CREATE TABLE USER(
  ID int(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  USERNAME varchar(100) UNIQUE NOT NULL,
  PASSWORD char(40) NOT NULL,
  NAME varchar(20),
  LASTNAME varchar(20)
)ENGINE=innoDB;

CREATE TABLE CATEGORY(
  ID int(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  CATEGORY varchar(45) NOT NULL
)ENGINE=innoDB;

CREATE TABLE NEWS(
  ID int(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  DATE date,
  TITLE varchar(45) NOT NULL,
  INFORMATION text NOT NULL,
  FKCATEGORY int(2) UNSIGNED NOT NULL,
  FOREIGN KEY (FKCATEGORY) REFERENCES category(ID) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=innoDB;

INSERT INTO USER (USERNAME, PASSWORD, NAME, LASTNAME)
VALUES
  ( 'marco.gonzalez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Marco', 'Gonzalez'),
  ( 'julieta.palmieri', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Julieta', 'Palmieri'),
  ( 'lucio.altamirano', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Lucio', 'Altamirano')


INSERT INTO category(CATEGORY)
VALUES ('Basquet'),('Futbol'),('Hockey'),('Rugby'),('Tenis'),('Voley');

INSERT INTO news (DATE, TITLE, INFORMATION, FKCATEGORY)
VALUES
  ('2018-06-16', 'Les mostré un video de LeBron', 'Tite, entrenador de Brasil, reconoció que el cambio de mentalidad de su equipo se debió a usar conceptos del básquet. Una de las claves del presente rendimiento de Brasil, arrollador e implacable a la hora de definir los partidos, no viene precisamente de un concepto del fútbol. Tite, entrenador de la selección brasileña, explicó la manera que utilizó para hacer que el conjunto trabaje como un bloque único."Cuando llegué al primer entrenamiento, me presenté con un video. Para sorpresa de los jugadores, no era nada de fútbol, sino que se trataba de un fragmento de juego de la NBA", explicó. " En él podían ver una jugada específica, en la que LeBron (James) trabaja por el bien del equipo".Pero, ¿por qué eso llamó la atención del entrenador y qué buscó decirles a sus dirigidos? "(Kyrie) Irving tira un triple y lo falla. Automáticamente, LeBron baja el rebote y se la devuelve a él para que pueda intentarlo nuevamente, y esta vez no falla. Con eso les mostré que aún siendo una estrella, James dejó de lado su mote de figura y fue a trabajar por el equipo, porque si se quedaba reclamando o haciendo gestos no llegaba a conseguir ese rebote. Les mostré la importancia de dejar los egos afuera y trabajar juntos", analizó. Este domingo desde las 15, Brasil debutará en el Mundial ante Suiza, con un Neymar que no llega en su mejor forma. "No llega al 100%, pero es muy privilegiado físicamente y aún así evoluciona tan bien que su nivel mejora día a día", cerró.', '1');
