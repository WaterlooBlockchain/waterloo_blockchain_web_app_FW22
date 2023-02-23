DROP PROCEDURE IF EXISTS GET_BLOG_POSTS;
CREATE PROCEDURE GET_BLOG_POSTS (
    IN p_id INT,
    IN p_title LONGTEXT,
    IN p_isFeatured BIT,
    IN p_tags LONGTEXT,
    IN p_content LONGTEXT,
    IN p_image LONGTEXT
)
BEGIN
    SELECT 
        id, 
        desanitize_string(title) AS title, 
        desanitize_string(tags) AS tags,
        isFeatured, 
        desanitize_string(content) AS content, 
        desanitize_string(image) AS image,
        created_at, 
        updated_at
    FROM 
        laravel.blog_posts
    WHERE 
        (p_id IS NULL OR id = p_id)
        AND (p_title IS NULL OR title = sanitize_string(p_title))
        AND (p_isFeatured IS NULL OR isFeatured = p_isFeatured)
        AND (p_tags IS NULL OR tags = sanitize_string(p_tags))
        AND (p_content IS NULL OR content = sanitize_string(p_content))
        AND (p_image IS NULL OR image = sanitize_string(p_image));
END;

DROP PROCEDURE IF EXISTS CREATE_BLOG_POST;
CREATE PROCEDURE CREATE_BLOG_POST (IN p_title LONGTEXT, IN p_isFeatured BOOL, IN p_tags LONGTEXT, IN p_content LONGTEXT, IN p_image LONGTEXT)
BEGIN
	
	DECLARE s_title LONGTEXT;
    DECLARE s_tags LONGTEXT;
    DECLARE s_content LONGTEXT;
    DECLARE s_image LONGTEXT;
   
    IF p_isFeatured IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Blog Post featured state cannot be null';
    END IF;

    IF p_title IS NULL OR LENGTH(p_title) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Blog Post title cannot be null or an empty string';
    END IF;

    IF p_content IS NULL OR LENGTH(p_content) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Blog Post content cannot be null or an empty string';
    END IF;

    IF p_image IS NULL OR LENGTH(p_image) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Blog Post image cannot be null or an empty string';
    END IF;
   
    SET s_title = sanitize_string(p_title);
    SET s_tags = COALESCE(sanitize_string(p_tags), '');
    SET s_content = sanitize_string(p_content);
    SET s_image = sanitize_string(p_image);
   
    INSERT INTO laravel.blog_posts (title, isFeatured, tags, content, image)
    VALUES (s_title, p_isFeatured, s_tags, s_content, s_image);
END;

DROP PROCEDURE IF EXISTS UPDATE_BLOG_POST;
CREATE PROCEDURE UPDATE_BLOG_POST (IN p_id BIGINT, IN p_title LONGTEXT, IN p_isFeatured BIT, IN p_tags LONGTEXT, IN p_content LONGTEXT, IN p_image LONGTEXT)
BEGIN
    DECLARE s_title LONGTEXT;
    DECLARE s_tags LONGTEXT;
    DECLARE s_content LONGTEXT;
    DECLARE s_image LONGTEXT;
    DECLARE s_isFeatured BOOL;

    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    SET s_title = COALESCE(sanitize_string(p_title), '');
    SET s_tags = COALESCE(sanitize_string(p_tags), '');
    SET s_content = COALESCE(sanitize_string(p_content), '');
    SET s_image = COALESCE(sanitize_string(p_image), '');

    IF LENGTH(s_title) = 0 THEN
        SELECT title INTO s_title FROM laravel.blog_posts WHERE id=p_id;
    END IF;

    IF LENGTH(s_tags) = 0 THEN
        SELECT tags INTO s_tags FROM laravel.blog_posts WHERE id=p_id;
    END IF;

    IF LENGTH(s_content) = 0 THEN
        SELECT content INTO s_content FROM laravel.blog_posts WHERE id=p_id;
    END IF;

    IF LENGTH(s_image) = 0 THEN
        SELECT image INTO s_image FROM laravel.blog_posts WHERE id=p_id;
    END IF;

    IF p_isFeatured IS NULL THEN
        SELECT isFeatured INTO s_isFeatured FROM laravel.blog_posts WHERE id=p_id;
    ELSEIF p_isFeatured = 1 THEN
        SET s_isFeatured = TRUE;
    ELSE
        SET s_isFeatured = FALSE;
    END IF;

    UPDATE laravel.blog_posts
        SET title = s_title,
            tags = s_tags,
            content = s_content,
            image = s_image,
            isFeatured = s_isFeatured
    WHERE id = p_id;
END;

DROP PROCEDURE IF EXISTS DELETE_BLOG_POST;
CREATE PROCEDURE DELETE_BLOG_POST (IN p_id BIGINT)
BEGIN
    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    DELETE FROM laravel.blog_posts WHERE id=p_id;
END

DROP PROCEDURE IF EXISTS GET_PAST_EVENTS;
CREATE PROCEDURE GET_PAST_EVENTS (
    IN p_id INT,
    IN p_title LONGTEXT,
    IN p_date DATE,
    IN p_content LONGTEXT,
    IN p_image LONGTEXT
)
BEGIN
    SELECT 
        id, 
        desanitize_string(title) AS title, 
        date,
        desanitize_string(content) AS content, 
        desanitize_string(image) AS image,
        created_at, 
        updated_at
    FROM 
        laravel.past_events
    WHERE 
        (p_id IS NULL OR id = p_id)
        AND (p_title IS NULL OR title = sanitize_string(p_title))
        AND (p_date IS NULL OR date = p_date)
        AND (p_content IS NULL OR content = sanitize_string(p_content))
        AND (p_image IS NULL OR image = sanitize_string(p_image));
END;

DROP PROCEDURE IF EXISTS CREATE_PAST_EVENT;
CREATE PROCEDURE CREATE_PAST_EVENT (IN p_title LONGTEXT, IN p_date DATE, IN p_content LONGTEXT, IN p_image LONGTEXT)
BEGIN
	DECLARE s_title LONGTEXT;
    DECLARE s_content LONGTEXT;
    DECLARE s_image LONGTEXT;
   
    IF p_date IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Past Event date cannot be null';
    END IF;

    IF p_title IS NULL OR LENGTH(p_title) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Past Event title cannot be null or an empty string';
    END IF;

    IF p_content IS NULL OR LENGTH(p_content) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Past Event content cannot be null or an empty string';
    END IF;
   
    SET s_title = sanitize_string(p_title);
    SET s_content = sanitize_string(p_content);
    SET s_image = sanitize_string(p_image);
   
    INSERT INTO laravel.blog_posts (title, isFeatured, tags, content, image)
    VALUES (s_title, p_isFeatured, s_tags, s_content, s_image);
END;


DROP PROCEDURE IF EXISTS UPDATE_PAST_EVENT;


DROP PROCEDURE IF EXISTS DELETE_PAST_EVENT;
CREATE PROCEDURE DELETE_PAST_EVENT (IN p_id BIGINT)
BEGIN
    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    DELETE FROM laravel.past_events WHERE id=p_id;
END
