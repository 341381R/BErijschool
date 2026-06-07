DROP PROCEDURE IF EXISTS SP_DeleteVoertuig;

DELIMITER $$

CREATE PROCEDURE SP_DeleteVoertuig(
     IN p_id    INT
)

BEGIN
    DELETE FROM Voertuig AS VRTG
        WHERE VRTG.Id = p_id;

        SELECT ROW_COUNT() AS affected;
END$$

DELIMITER ;