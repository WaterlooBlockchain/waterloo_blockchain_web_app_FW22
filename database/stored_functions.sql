DROP FUNCTION IF EXISTS `sanitize_string`;
CREATE FUNCTION sanitize_string(input_str LONGTEXT)
RETURNS LONGTEXT
DETERMINISTIC
BEGIN
    DECLARE output_str LONGTEXT;
    SET output_str = REPLACE(input_str, "'", "''");
    SET output_str = REPLACE(output_str, ">", "&gt;");
    SET output_str = REPLACE(output_str, "<", "&lt;");
    SET output_str = REPLACE(output_str, """", "&quot;");
    SET output_str = REPLACE(output_str, ";", "&#59;");
    SET output_str = REPLACE(output_str, ")", "&#41;");
    SET output_str = REPLACE(output_str, "(", "&#40;");
    SET output_str = REPLACE(output_str, "-", "&#45;");
    SET output_str = REPLACE(output_str, "%", "&#37;");
    SET output_str = REPLACE(output_str, "`", "&#96;");
    RETURN output_str;
END;


DROP FUNCTION IF EXISTS `desanitize_string`;
CREATE FUNCTION desanitize_string(input_str LONGTEXT)
RETURNS LONGTEXT
DETERMINISTIC
BEGIN
    DECLARE output_str LONGTEXT;
    SET output_str = REPLACE(input_str, "&#96;", "`");
    SET output_str = REPLACE(output_str, "&#37;", "%");
    SET output_str = REPLACE(output_str, "&#45;", "-");
    SET output_str = REPLACE(output_str, "&#40;", "(");
    SET output_str = REPLACE(output_str, "&#41;", ")");
    SET output_str = REPLACE(output_str, "&#59;", ";");
    SET output_str = REPLACE(output_str, "&quot;", """");
    SET output_str = REPLACE(output_str, "&lt;", "<");
    SET output_str = REPLACE(output_str, "&gt;", ">");
    SET output_str = REPLACE(output_str, "''", "'");
    RETURN output_str;
END;