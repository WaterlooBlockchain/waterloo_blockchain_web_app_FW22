-- Creates a user named WRITER that only has permission on stored procedures
CREATE USER 'WRITER'@'localhost' IDENTIFIED BY 'your_password';
GRANT EXECUTE ON `laravel`.* TO 'WRITER'@'localhost';

-- Creates a user named APP that only has permission to execute SELECT and desanitize_string
CREATE USER 'APP'@'localhost' IDENTIFIED BY 'your_password';
GRANT SELECT ON laravel.* TO 'APP'@'localhost';
GRANT EXECUTE ON FUNCTION laravel.desanitize_string TO 'APP'@'localhost';
