DELIMITER $$

CREATE FUNCTION sanitize_input(p_input VARCHAR(255))
RETURNS VARCHAR(255)
BEGIN
SET p_input = REPLACE(REPLACE(REPLACE(REPLACE(p_input, '\', '\\'), ''', '\''), '"', '\"'), '!', '\!');
SET p_input = REPLACE(REPLACE(p_input, '?', '\?'), '=', '\=');
RETURN p_input;
END $$

DELIMITER ;

DELIMITER $$

CREATE FUNCTION desanitize_input(p_input VARCHAR(255))
RETURNS VARCHAR(255)
BEGIN
SET p_input = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(p_input, '\\', '\'), '\'', '''), '\"', '"'), '\!', '!'), '\?', '?');
SET p_input = REPLACE(p_input, '\=', '=');
RETURN p_input;
END $$

DELIMITER ;