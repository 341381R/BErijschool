DROP PROCEDURE IF EXISTS SP_GetInstructeurById;

DELIMITER $$

CREATE PROCEDURE SP_GetInstructeurById(
    IN p_id INT
)
BEGIN

    SELECT   ISTR.Id AS InstructeurId
            ,VRTG.Id AS VoertuigId
            ,VGIR.Id AS VoertuigInstructeurId
            ,(CONCAT_WS(" ", ISTR.Voornaam, ISTR.Tussenvoegsel, ISTR.Achternaam)) AS Naam
            ,ISTR.DatumInDienst
            ,LENGTH(ISTR.AantalSterren) AS AantalSterren
            ,TPVG.TypeVoertuig
            ,VRTG.Type
            ,VRTG.Kenteken
            ,VRTG.Bouwjaar
            ,VRTG.Brandstof
            ,TPVG.Rijbewijscategorie
            ,CASE WHEN (SELECT COUNT(*) FROM VoertuigInstructeur VI WHERE VI.VoertuigId = VGIR.VoertuigId) > 1 THEN 1 ELSE 0 END AS Toegewezen
    FROM Instructeur AS ISTR
    LEFT JOIN VoertuigInstructeur AS VGIR
    ON ISTR.Id = VGIR.InstructeurId AND VGIR.IsActief = 1
    LEFT JOIN Voertuig AS VRTG
    ON VRTG.Id = VGIR.VoertuigId
    LEFT JOIN TypeVoertuig AS TPVG
    ON TPVG.Id = VRTG.TypeVoertuigId
    WHERE ISTR.Id = p_id
    ORDER BY Rijbewijscategorie;


END$$

DELIMITER ;