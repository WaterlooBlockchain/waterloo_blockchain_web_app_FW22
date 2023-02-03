SET @table_name = '';
SET @backup_table_name = '';
SET @sql = '';

DECLARE table_cursor CURSOR FOR
    SELECT table_name
    FROM information_schema.tables
    WHERE table_schema = 'laravel';

OPEN table_cursor;

FETCH NEXT FROM table_cursor INTO @table_name;

WHILE @@FETCH_STATUS = 0
BEGIN
    SET @backup_table_name = CONCAT('backup_', @table_name);
    SET @sql = CONCAT('CREATE TABLE IF NOT EXISTS ', @backup_table_name, ' LIKE ', @table_name, ';');
    SET @sql = CONCAT(@sql, 'INSERT INTO ', @backup_table_name, ' SELECT * FROM ', @table_name, ';');

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    FETCH NEXT FROM table_cursor INTO @table_name;
END WHILE;

CLOSE table_cursor;
DEALLOCATE table_cursor;
