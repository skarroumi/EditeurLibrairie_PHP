
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('KASI','Kathy','Sierra');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('BEBA','Bert','Bates');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('DERI','Dennis','Ritchie');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('BRKE','Brian','Kernighan');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('HALE','Harper','Lee');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('DALI','David','Linden');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('DAKA','Daniel','Kahneman');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('STME','Stephen','C. Meyer');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('HAYU','Hamza','Yusuf');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('KACO','Katie','Couric');
INSERT INTO Auteur (Pseudonyme, Nom, Prenom) VALUES ('ALMI','Alan','Michelson');



INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 2003, 2000, 460.38,'144934013X');
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (2, 2005, 4000, 700,'144934013X' );
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 1978, 500,500,'0131101633' );
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (2, 1988, 1500,650,'0131101633' );
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 1960, 3000,400,'0062420704' );
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 2011, 5500,300,'0143120751' );
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 2011, 4000,520,'8490322503');
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 2013, 9000,980,'0062071483');
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 2004, 7500,1040,'098556590X');
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (1, 2011, 6000,620,'0812982584');
INSERT INTO EEdition (NumEdition, Annee, NombreExemplaire, Prix, ISBN) VALUES (3, 2012, 1100,1735,'0123878373');


INSERT INTO Livre (ISBN, Titre) VALUES ('144934013X', 'Head First Java');
INSERT INTO Livre (ISBN, Titre) VALUES ('0131101633', 'The C Programming Language');
INSERT INTO Livre (ISBN, Titre) VALUES ('0062420704', 'To Kill a Mockhingbird');
INSERT INTO Livre (ISBN, Titre) VALUES ('0143120751', 'The Compass of Pleasure');
INSERT INTO Livre (ISBN, Titre) VALUES ('8490322503', 'Thinking, Fast and Slow');
INSERT INTO Livre (ISBN, Titre) VALUES ('0062071483', 'Darwins Doubt');
INSERT INTO Livre (ISBN, Titre) VALUES ('098556590X', 'Purification of the Heart');
INSERT INTO Livre (ISBN, Titre) VALUES ('0812982584', 'The Best Advice I Ever Got');
INSERT INTO Livre (ISBN, Titre, Prize) VALUES ('0123878373', 'Platelets','BMA Medical Book Award 2013');


INSERT INTO Adresse(CdeAdresse, Rue, Ville, Pays) VALUES(1, 'Zertkouni', 'Casablanca', 'Maroc');
INSERT INTO Adresse(CdeAdresse, Rue, Ville, Pays) VALUES(2, 'Aghanistan', 'Rabat', 'Maroc');
INSERT INTO Adresse(CdeAdresse, Rue, Ville, Pays) VALUES(3, 'Mekka', 'Marrakech', 'Maroc');
INSERT INTO Adresse(CdeAdresse, Rue, Ville, Pays) VALUES(4, 'Oasis', 'Agadir', 'Maroc');


INSERT INTO Libraire(CdeLibraire, Nom, CdeAdresse) VALUES(5401,'Saad Amine', 1);
INSERT INTO Libraire(CdeLibraire, Nom, CdeAdresse) VALUES(5402,'Rajae Sabir', 2);
INSERT INTO Libraire(CdeLibraire, Nom, CdeAdresse) VALUES(5403,'Amine Gharib', 3);
INSERT INTO Libraire(CdeLibraire, Nom, CdeAdresse) VALUES(5404,'Nada Mouhib', 4);

