SET @table_name = '';
SET @backup_table_name = '';
SET @sql = '';

DECLARE table_cursor CURSOR FOR
    SELECT table_name
    FROM information_schema.tables
    WHERE table_schema = 'database_name';

OPEN table_cursor;

FETCH NEXT FROM table_cursor INTO @table_name;

WHILE @@FETCH_STATUS = 0
BEGIN
    SET @backup_table_name = CONCAT('backup_', @table_name);
    SET @sql = CONCAT('CREATE TRIGGER ', @table_name, '_backup_trigger',
        ' AFTER INSERT ON ', @table_name,
        ' FOR EACH ROW',
        ' BEGIN',
        '     INSERT INTO ', @backup_table_name, ' SELECT * FROM ', @table_name, ' WHERE ', @table_name, '.id = NEW.id;',
        ' END;',
        ' CREATE TRIGGER ', @table_name, '_update_backup_trigger',
        ' AFTER UPDATE ON ', @table_name,
        ' FOR EACH ROW',
        ' BEGIN',
        '     INSERT INTO ', @backup_table_name, ' SELECT * FROM ', @table_name, ' WHERE ', @table_name, '.id = OLD.id;',
        ' END;');

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    FETCH NEXT FROM table_cursor INTO @table_name;
END;

CLOSE table_cursor;
DEALLOCATE table_cursor;
