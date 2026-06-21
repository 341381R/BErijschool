DROP PROCEDURE IF EXISTS ToggleInstructeurStatus;

DELIMITER $$

CREATE PROCEDURE ToggleInstructeurStatus(
    IN instructeur_id INT UNSIGNED
)
BEGIN
    UPDATE Instructeur 
    SET Isactief = NOT Isactief 
    WHERE Id = instructeur_id;

    UPDATE VoertuigInstructeur
    SET Isactief = (SELECT Isactief FROM Instructeur WHERE Id = instructeur_id)
    WHERE InstructeurId = instructeur_id;
END$$

DELIMITER ;