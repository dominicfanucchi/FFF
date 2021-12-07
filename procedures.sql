DROP PROCEDURE IF EXISTS RegisterUser;
DROP PROCEDURE IF EXISTS RegisterEmployee;
DROP PROCEDURE IF EXISTS DeleteUser;
DROP PROCEDURE IF EXISTS AnimalAdoption;
DROP PROCEDURE IF EXISTS AdoptionRequest;
DROP PROCEDURE IF EXISTS GenerateID;
DROP PROCEDURE IF EXISTS UsersAdoptions;


DELIMITER //

CREATE PROCEDURE `RegisterUser`(uName varchar(24), pWord varchar(255), phone bigint(20))
BEGIN
	SELECT COUNT(*) INTO @userCount FROM User
	WHERE User.Username = uName;

	

	IF @usercount > 0 THEN
		SELECT NULL as UserID, "Username already exists" as 'Error';
	ELSE
		SET @uID = 55555555;

		CALL GenerateID(@uID);

		INSERT INTO User(UserID, Username, Password, PhoneNumber, CheckStat,)
		VALUES (@uID, uName, pWord, phone, 'n', fName, lName);
		SELECT Username AS username, NULL AS 'Error';
	END IF;

END;

//

CREATE PROCEDURE `RegisterEmployee`(uName varchar(24), pWord varchar(255), phone bigint(20), sID int(11))
BEGIN
	SELECT COUNT(*) INTO @usercount FROM User
	WHERE User.Username = uName;
	
	SET @uID = 55555555;

	/* If not already a user, add it */
	IF @usercount < 1 THEN

		CALL GenerateID(@uID);

		INSERT INTO User(UserID, Username, Password, PhoneNumber, CheckStat, FName, LName)
		VALUES (@uID,uName, pWord, phone, 'n');

	ELSE
		/* if user already exists, pull its uID */
		SELECT UserID INTO @uID FROM User
		WHERE User.Username = uName;

	END IF;

	SELECT COUNT(*) INTO @empcount from Employee
	WHERE Employee.UserID = @uID

	/* If not a duplicate, add as employee */
	IF @empcount < 1 THEN
		SELECT Name INTO @ShelterName FROM Shelter
		WHERE Shelter.ShelterID = sID;
		SELECT CURRENT_DATE() INTO @today

		INSERT INTO Employee(UserID, ShelterID, Name, HireDate)
		VALUES (uID, sID, @ShelterName, today);
		SELECT Username AS username, NULL AS 'Error';
	ELSE
		SELECT NULL AS username, "Employee already exists"

	END IF;

END;

//


CREATE PROCEDURE `DeleteUser`(uName varchar(24))
BEGIN
	SELECT UserID INTO @uID FROM User
	WHERE Username = uName;
	SELECT COUNT(*) INTO @usercount FROM User
	WHERE User.Username = uName;
	SELECT COUNT(*) INTO @employeecount FROM Employee
	WHERE Employee.UserID = @uID;
        
	/* If user exists, delete */
	IF @usercount > 0 THEN
		DELETE FROM User WHERE User.Username = uName;
		DELETE FROM Adopter WHERE Adopter.UserID = @uID;
		/* If user is an employee, delete that too */
		IF @employeecount > 0 THEN
			DELETE FROM Employee WHERE Employee.UserID = @uID;
		END IF;
	ELSE
		SELECT NULL AS Username, "User not found" as 'Error';
	END IF
	/* should've just made this a trigger */
END;

//
/* change to use username, not userid */
CREATE PROCEDURE `AnimalAdoption`(uName varchar(24), aID int(11), price decimal(7,2))
BEGIN 
	SELECT UserID INTO @uID FROM User
	WHERE Username = uName;

	SELECT COUNT(*) INTO @usercount FROM User
	WHERE User.UserID = @uID;
	SELECT COUNT(*) INTO @animalcount FROM Animal
	WHERE Animal.UserID = aID;
	SELECT ShelterID INTO @sID FROM Animal
	WHERE Animal.AnimalID = aID;
	SELECT CURRENT_DATE() INTO @today;

	/* If the animal and user exist */
	IF @usercount > 0 AND @animalcount > 0 THEN
		INSERT INTO Adopts(ShelterID, AnimalID, AdopterID, AdoptionDate, Price)
		VALUES($sID, aID, @uID, @today, price);
		DELETE FROM Animal WHERE Animal.AnimalID = aID;
	END IF
END;

//

CREATE PROCEDURE `UsersAdoptions`(uName varchar(24))
BEGIN
	/* just returns the number of adoptions by a user. Cant replace mid 
	string with a variable in mariadb, so will need to do on php side */

	SELECT UserID INTO @uID FROM User
	WHERE Username = uName;

	SELECT COUNT(*) INTO @useradopts FROM Adopts
	WHERE Adopts.UserID = @uID;

	SELECT @useradopts;

END;

//  

CREATE PROCEDURE `GenerateID`(OUT @uID int(11))
BEGIN
	/* use OUT */ 
	SELECT UserID INTO @uID FROM User
	WHERE User.Username = 'nofunzone'
	
	SELECT COUNT(*) INTO @exist FROM User
	WHERE User.UserID = @uID;

	WHILE @exist > 0 DO
		SELECT FLOOR(RAND()*(99999999-10000000+1) + 10000000) INTO @uID;

		SELECT COUNT(*) INTO @exist FROM User
		WHERE User.UserID = @uID;
	END WHILE;

END;
//

DELIMITER ;


