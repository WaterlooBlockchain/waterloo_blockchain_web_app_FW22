DELIMITER $$

CREATE FUNCTION sanitize_input(p_input VARCHAR(255))
RETURNS VARCHAR(255)
BEGIN
  RETURN REPLACE(REPLACE(REPLACE(p_input, '\\', '\\\\'), '\'', '\\\''), '\"', '\\\"');
END $$

DELIMITER ;

DELIMITER $$

CREATE FUNCTION de_sanitize_input(p_input VARCHAR(255))
RETURNS VARCHAR(255)
BEGIN
  RETURN REPLACE(REPLACE(REPLACE(p_input, '\\\\', '\\'), '\\\'', '\''), '\\\"', '\"');
END $$

DELIMITER ;