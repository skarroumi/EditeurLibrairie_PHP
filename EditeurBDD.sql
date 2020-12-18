DROP TABLE IF EXISTS `Adresse`;
CREATE TABLE IF NOT EXISTS `Adresse` (
  `CdeAdresse` int(10) NOT NULL,
  `Rue` varchar(20) NOT NULL,
  `Ville` varchar(20) NOT NULL,
  `Pays` varchar(20) NOT NULL,
  PRIMARY KEY (`CdeAdresse`)
);

DROP TABLE IF EXISTS `Auteur`;
CREATE TABLE IF NOT EXISTS `Auteur` (
  `Pseudonyme` varchar(20) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  PRIMARY KEY (`Pseudonyme`)
);

DROP TABLE IF EXISTS `Libraire`;
CREATE TABLE IF NOT EXISTS `Libraire` (
  `CdeLibraire` int(10) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `CdeAdresse` int(20) NOT NULL,
  PRIMARY KEY (`CdeLibraire`),
  FOREIGN KEY(CdeAdresse) REFERENCES Adresse(CdeAdresse) ON DELETE CASCADE ON UPDATE CASCADE
);


DROP TABLE IF EXISTS `EEdition`;
CREATE TABLE IF NOT EXISTS `EEdition` (
  `NumEdition` int(10) NOT NULL,
  `Annee` int(20) NOT NULL,
  `NombreExemplaire` int(20) NOT NULL,
  `Prix` float NOT NULL,
  PRIMARY KEY (`NumEdition`)
);


DROP TABLE IF EXISTS `Livre`;
CREATE TABLE IF NOT EXISTS `Livre` (
  `ISBN` varchar(20) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `Prize` varchar(100),
  `NumEdition` int(10) NOT NULL,
  PRIMARY KEY (`ISBN`),
  FOREIGN KEY(NumEdition) REFERENCES EEdition(NumEdition) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS `Commande`;
CREATE TABLE IF NOT EXISTS `Commande` (
  `CdeCommande` int(10) NOT NULL,
  `CdeLibraire` int(20) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Quantite` int(20) NOT NULL,
  PRIMARY KEY (`CdeCommande`),
  FOREIGN KEY(CdeLibraire) REFERENCES Libraire(CdeLibraire) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(ISBN) REFERENCES Livre(ISBN) ON DELETE CASCADE ON UPDATE CASCADE
);



DROP TABLE IF EXISTS `LivreAuteurPourcentage`;
CREATE TABLE IF NOT EXISTS `LivreAuteurPourcentage` (
  `CdeRelation` int(10) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Pseudonyme` varchar(20) NOT NULL,
  `Pourcentage` float NOT NULL,
  PRIMARY KEY (`CdeRelation`),
  FOREIGN KEY(ISBN) REFERENCES Livre(ISBN) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY(Pseudonyme) REFERENCES Auteur(Pseudonyme) ON DELETE CASCADE ON UPDATE CASCADE
);

COMMIT;




