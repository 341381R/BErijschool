DROP PROCEDURE IF EXISTS SP_GetAllVoertuigen;

DELIMITER $$

CREATE PROCEDURE SP_GetAllVoertuigen()
BEGIN

    SELECT   ISTR.Id AS InstructeurId
            ,VRTG.Id AS VoertuigId
            ,(CONCAT_WS(" ", ISTR.Voornaam, ISTR.Tussenvoegsel, ISTR.Achternaam)) AS Naam
            ,ISTR.DatumInDienst
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
    ON TPVG.Id = VRTG.TypeVoertuigId;


END$$

DELIMITER ;