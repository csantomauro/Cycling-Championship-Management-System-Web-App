SET storage_engine=InnoDB;
SET FOREIGN_KEY_CHECKS=1;
CREATE DATABASE IF NOT EXISTS CyclingChampionship;

use CyclingChampionship;

DROP TABLE IF EXISTS CYCLIST;
DROP TABLE IF EXISTS TEAM;
DROP TABLE IF EXISTS STAGE;
DROP TABLE IF EXISTS INDIVIDUAL_CLASSIFICATION;

CREATE TABLE CYCLIST (
	CodC INTEGER ,
	Name CHAR(50) NOT NULL ,
	Surname CHAR(50) NOT NULL ,
	Nationality CHAR(50) NOT NULL ,
	CodT INTEGER NOT NULL ,
	BirthYear INTEGER NULL ,
	PRIMARY KEY (CodC)  
);

CREATE TABLE TEAM (
	CodT INTEGER ,
	NameT CHAR(50) NOT NULL ,
	FoundationYear INTEGER NOT NULL ,
	LegalAddress CHAR(50) NOT NULL ,
	PRIMARY KEY (CodT)
);

CREATE TABLE STAGE (
	Edition INTEGER ,
        CodS INTEGER ,
	StartingCity CHAR(50) NOT NULL ,
        ArrivalCity CHAR(50) NOT NULL ,
	Lenght INTEGER NOT NULL ,
        HeightDifference INTEGER NOT NULL ,
	DifficultyLevel INTEGER NOT NULL ,
	PRIMARY KEY (Edition, CodS) ,
        CONSTRAINT chk_Lvl CHECK (DifficultyLevel>=1 and DifficultyLevel<=10)
);

CREATE TABLE INDIVIDUAL_CLASSIFICATION (
	CodC INTEGER ,
        CodS INTEGER ,
        Edition INTEGER ,
	Ranking INTEGER ,
	PRIMARY KEY (CodC, CodS, Edition) 
);  

use CyclingChampionship;

INSERT INTO CYCLIST (CodC, Name, Surname, Nationality, CodT, BirthYear)
VALUES (1, 'Marco', 'Pantani', 'Italian', 1, 1970);
INSERT INTO CYCLIST (CodC, Name, Surname, Nationality, CodT, BirthYear)
VALUES (2, 'Fausto', 'Coppi', 'Italian', 1, 1919);
INSERT INTO CYCLIST (CodC, Name, Surname, Nationality, CodT, BirthYear)
VALUES (3, 'Eddy', 'Merckx', 'Belgian', 2, 1945);
INSERT INTO CYCLIST (CodC, Name, Surname, Nationality, CodT, BirthYear)
VALUES (4, 'Bernard', 'Hinault', 'French', 3, 1954);
INSERT INTO CYCLIST (CodC, Name, Surname, Nationality, CodT, BirthYear)
VALUES (5, 'Miguel', 'Indurain', 'Spanish', 3, 1964);

INSERT INTO TEAM (CodT, NameT, FoundationYear, LegalAddress)
VALUES (1, 'Team1', 1901, 'ViaDanteAlighieri');
INSERT INTO TEAM (CodT, NameT, FoundationYear, LegalAddress)
VALUES (2, 'Team2', 1902, 'ViaFrancescoPetrarca');
INSERT INTO TEAM (CodT, NameT, FoundationYear, LegalAddress)
VALUES (3, 'Team3', 1903, 'ViaGiovanniBoccaccio');


INSERT INTO STAGE (Edition, CodS, StartingCity, ArrivalCity, Lenght, HeightDifference, DifficultyLevel)
VALUES (1, 1, 'Naples', 'Rome', 226, 10, 3);
INSERT INTO STAGE (Edition, CodS, StartingCity, ArrivalCity, Lenght, HeightDifference, DifficultyLevel)
VALUES (1, 2, 'Naples', 'Milan', 772, 30, 9);
INSERT INTO STAGE (Edition, CodS, StartingCity, ArrivalCity, Lenght, HeightDifference, DifficultyLevel)
VALUES (1, 3, 'Rome', 'Milan', 573, 20, 6);

INSERT INTO INDIVIDUAL_CLASSIFICATION (CodC, CodS, Edition, Ranking)
VALUES (1, 1, 1, 1);
INSERT INTO INDIVIDUAL_CLASSIFICATION (CodC, CodS, Edition, Ranking)
VALUES (2, 1, 1, 2);
INSERT INTO INDIVIDUAL_CLASSIFICATION (CodC, CodS, Edition, Ranking)
VALUES (3, 1, 1, 3);
INSERT INTO INDIVIDUAL_CLASSIFICATION (CodC, CodS, Edition, Ranking)
VALUES (4, 3, 1, 1);
INSERT INTO INDIVIDUAL_CLASSIFICATION (CodC, CodS, Edition, Ranking)
VALUES (5, 3, 1, 2);
