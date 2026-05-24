DROP PROCEDURE IF EXISTS SP_GetAllInstructeurs;

DELIMITER $$

CREATE PROCEDURE SP_GetAllInstructeurs()
BEGIN

    SELECT   ISTR.Id
            ,(CONCAT_WS(" ", ISTR.Voornaam, ISTR.Tussenvoegsel, ISTR.Achternaam)) AS Naam
            ,ISTR.Mobiel
            ,ISTR.DatumInDienst
            ,LENGTH(ISTR.AantalSterren) AS AantalSterren
    FROM Instructeur AS ISTR
    ORDER BY LENGTH(ISTR.AantalSterren) DESC;


END$$

DELIMITER ;