-- CREATE DATABASE
CREATE DATABASE 'cisc3300';

-- CREATE TABLE
CREATE TABLE `notes` (
  `ID`          int(11) NOT NULL AUTO_INCREMENT,
  `Title`       varchar(80) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`ID`)
);

-- INSERT DATA
INSERT INTO `notes` (`Title`, `Description`) 
VALUES('Sleep', 'I got 3 hours of sleep last night'); 
INSERT INTO `notes` (`Title`, `Description`) 
VALUES('Dog', 'A dog chased me around the park'); 
INSERT INTO `notes` (`Title`, `Description`) 
VALUES('Music', 'I got a new vinyl record as a gift'); 
INSERT INTO `notes` (`Title`, `Description`) 
VALUES('Cup', 'Saw a kirby cup today while I was shopping'); 
INSERT INTO `notes` (`Title`, `Description`) 
VALUES('Bear', 'My sister bought me a teddy bear to add to my collection');

-- REVERSE ALPHABETICAL ORDER
SELECT * FROM `notes` ORDER BY `Title` DESC;

-- SELECT SECOND NOTE
SELECT * FROM `notes` LIMIT 1 OFFSET 1;

-- SELECT NOTES THAT CONTAIN VOWELS
SELECT * FROM `notes`
WHERE `Description` LIKE '%a%' 
   OR `Description` LIKE '%e%' 
   OR `Description` LIKE '%i%' 
   OR `Description` LIKE '%o%' 
   OR `Description` LIKE '%u%';

-- UPDATE DATA
UPDATE `notes` SET 'Title' = 'Gift' WHERE `ID`=3;

-- DELETE DATA
DELETE FROM `notes` WHERE `ID`=1;