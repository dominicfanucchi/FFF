DELIMITER //

CREATE VIEW animal_info
AS SELECT AnimalID, Name, Species, Sex, AdoptionStatus
FROM Animal
WHERE AdoptionStatus = “False”;

//
DELIMITER ;

DELIMITER //


CREATE VIEW bako_shelter_dogs
AS SELECT a.AnimalID, a.Species, a.AdoptionStatus, s.Name AS "Shelter Name", s.City
FROM Animal AS a
JOIN Shelter AS s ON s.City = "Bakersfield"
WHERE a.Species = "Dog"
AND a.ShelterID = s.ShelterID;

//
DELIMITER ;

DELIMITER //

CREATE VIEW user_adoptions
AS SELECT u.UserID, u.FName AS "First Name", u.LName AS "Last Name", ad.AnimalID, an.Name AS "Animal Name", ad.AdoptionDate
FROM User AS u
JOIN Adopts AS ad ON ad.AdopterID = u.UserID
JOIN Animal AS an ON an.AnimalID = ad.AnimalID
WHERE an.AdoptionStatus = "True";

//
DELIMITER ;
