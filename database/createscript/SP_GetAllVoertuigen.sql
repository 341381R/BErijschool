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
            ,VRTG.IsActief
    FROM Instructeur AS ISTR
    RIGHT JOIN VoertuigInstructeur AS VGIR
    ON ISTR.Id = VGIR.InstructeurId
    RIGHT JOIN Voertuig AS VRTG
    ON VRTG.Id = VGIR.VoertuigId
    RIGHT JOIN TypeVoertuig AS TPVG
    ON TPVG.Id = VRTG.TypeVoertuigId
    ORDER BY VRTG.Bouwjaar DESC, ISTR.Achternaam;


END$$

DELIMITER ;