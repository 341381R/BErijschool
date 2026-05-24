DROP PROCEDURE IF EXISTS SP_GetInstructeurById;

DELIMITER $$

CREATE PROCEDURE SP_GetInstructeurById(
    IN p_id INT
)
BEGIN

    SELECT   ISTR.Id
            ,(CONCAT_WS(" ", ISTR.Voornaam, ISTR.Tussenvoegsel, ISTR.Achternaam)) AS Naam
            ,ISTR.DatumInDienst
            ,LENGTH(ISTR.AantalSterren) AS AantalSterren
            ,TPVG.TypeVoertuig
            ,VRTG.Type
            ,VRTG.Kenteken
            ,VRTG.Bouwjaar
            ,VRTG.Brandstof
            ,TPVG.Rijbewijscategorie
    FROM Instructeur AS ISTR
    INNER JOIN VoertuigInstructeur AS VGIR
    ON ISTR.Id = VGIR.InstructeurId
    INNER JOIN Voertuig AS VRTG
    ON VRTG.Id = VGIR.VoertuigId
    INNER JOIN TypeVoertuig AS TPVG
    ON TPVG.Id = VRTG.TypeVoertuigId
    WHERE ISTR.Id = p_id;


END$$

DELIMITER ;