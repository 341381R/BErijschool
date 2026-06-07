DROP PROCEDURE IF EXISTS SP_DeleteInstructeur;

DELIMITER $$

CREATE PROCEDURE SP_DeleteInstructeur(
     IN p_VoertuigId                 INT
    ,IN p_VoertuigInstructeurId      INT
)

BEGIN
    DELETE FROM VoertuigInstructeur AS VGIR
        WHERE VGIR.Id = p_VoertuigInstructeurid;

        SELECT ROW_COUNT() AS affected;

    UPDATE Voertuig AS VRTG
        SET     VRTG.IsActief = 0
        WHERE   VRTG.Id = p_VoertuigId;

END$$

DELIMITER ;