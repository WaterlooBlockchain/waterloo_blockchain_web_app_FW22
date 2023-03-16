DROP PROCEDURE IF EXISTS GET_BLOG_POSTS;
CREATE PROCEDURE GET_BLOG_POSTS (IN p_id INT, IN p_title LONGTEXT, IN p_isFeatured BIT, IN p_tags LONGTEXT, IN p_content LONGTEXT, IN p_image LONGTEXT)
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
END;

DROP PROCEDURE IF EXISTS GET_PAST_EVENTS;
CREATE PROCEDURE GET_PAST_EVENTS (IN p_id INT,IN p_title LONGTEXT,IN p_date DATE,IN p_content LONGTEXT,IN p_image LONGTEXT)
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
   
    INSERT INTO laravel.past_events (title, date, content, image)
    VALUES (s_title, p_date, s_content, s_image);
END;

DROP PROCEDURE IF EXISTS UPDATE_PAST_EVENT;
CREATE PROCEDURE UPDATE_PAST_EVENT (IN p_id INT, IN p_title LONGTEXT, IN p_date DATE, IN p_content LONGTEXT, IN p_image LONGTEXT)
BEGIN
    DECLARE s_title LONGTEXT;
    DECLARE s_content LONGTEXT;
    DECLARE s_image LONGTEXT;
    DECLARE s_date DATE;

    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    SET s_title = COALESCE(sanitize_string(p_title), '');
    SET s_content = COALESCE(sanitize_string(p_content), '');
    SET s_image = COALESCE(sanitize_string(p_image), '');
    SET s_date = COALESCE(p_date, '');

    IF LENGTH(s_title) = 0 THEN
        SELECT title INTO s_title FROM laravel.past_events WHERE id=p_id;
    END IF;

    IF LENGTH(s_content) = 0 THEN
        SELECT content INTO s_content FROM laravel.past_events WHERE id=p_id;
    END IF;

    IF LENGTH(s_image) = 0 THEN
        SELECT image INTO s_image FROM laravel.past_events WHERE id=p_id;
    END IF;

    IF LENGTH(s_date) = 0 THEN
        SELECT image INTO s_image FROM laravel.past_events WHERE id=p_id;
    END IF;

    UPDATE laravel.past_events
        SET title = s_title,
            content = s_content,
            image = s_image,
            date = s_date
    WHERE id = p_id;
END;

DROP PROCEDURE IF EXISTS DELETE_PAST_EVENT;
CREATE PROCEDURE DELETE_PAST_EVENT (IN p_id BIGINT)
BEGIN
    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    DELETE FROM laravel.past_events WHERE id=p_id;
END;

DROP PROCEDURE IF EXISTS GET_PARTNERSHIPS;
CREATE PROCEDURE GET_PARTNERSHIPS (IN p_id INT,IN p_name LONGTEXT,IN p_link LONGTEXT,IN p_isCurrent BIT,IN p_image LONGTEXT)
BEGIN
    SELECT 
        id, 
        desanitize_string(name) AS name, 
        desanitize_string(link) AS link,
        isCurrent, 
        desanitize_string(image) AS image,
        created_at, 
        updated_at
    FROM 
        laravel.partnerships
    WHERE 
        (p_id IS NULL OR id = p_id)
        AND (p_name IS NULL OR name = sanitize_string(p_title))
        AND (p_link IS NULL OR link = sanitize_string(p_link))
        AND (p_isCurrent IS NULL OR isCurrent = p_isCurrent)
        AND (p_image IS NULL OR image = sanitize_string(p_image));
END;

DROP PROCEDURE IF EXISTS CREATE_PARTNERSHIP;
CREATE PROCEDURE CREATE_PARTNERSHIP (IN p_name LONGTEXT,IN p_link LONGTEXT,IN p_isCurrent BIT,IN p_image LONGTEXT)
BEGIN
    DECLARE s_link LONGTEXT;
    DECLARE s_image LONGTEXT;
    DECLARE s_name LONGTEXT;
   
    IF p_link IS NULL OR LENGTH(p_link) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Partnership link cannot be null or an empty string';
    END IF;

    IF p_image IS NULL OR LENGTH(p_image) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Partnership content cannot be null or an empty string';
    END IF;
   
    SET s_link = sanitize_string(p_link);
    SET s_image = sanitize_string(p_image);
    SET s_name = "";

    IF p_name IS NOT NULL OR LENGTH(p_name) != 0 THEN SET s_name = sanitize_string(p_name);
    ELSE SET s_name = '';
    END IF;
   
    INSERT INTO laravel.partnerships (name, link, isCurrent, image)
    VALUES (s_name, s_link, p_isCurrent, s_image);
END;

DROP PROCEDURE IF EXISTS UPDATE_PARTNERSHIP;
CREATE PROCEDURE UPDATE_PARTNERSHIP (IN p_id INT, IN p_name LONGTEXT,IN p_link LONGTEXT,IN p_isCurrent BIT,IN p_image LONGTEXT)
BEGIN
    DECLARE s_link LONGTEXT;
    DECLARE s_image LONGTEXT;
    DECLARE s_name LONGTEXT;
    DECLARE s_isCurrent BOOL;

    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    SET s_link = COALESCE(sanitize_string(p_link), '');
    SET s_image = COALESCE(sanitize_string(p_image), '');
    SET s_name = COALESCE(sanitize_string(p_name), '');

    IF LENGTH(s_link) = 0 THEN
        SELECT link INTO s_link FROM laravel.partnerships WHERE id=p_id;
    END IF;

    IF LENGTH(s_name) = 0 THEN
        SELECT name INTO s_name FROM laravel.partnerships WHERE id=p_id;
    END IF;

    IF LENGTH(s_image) = 0 THEN
        SELECT image INTO s_image FROM laravel.partnerships WHERE id=p_id;
    END IF;

    IF p_isCurrent IS NULL THEN
        SELECT isCurrent INTO s_isCurrent FROM laravel.blog_posts WHERE id=p_id;
    ELSEIF p_isCurrent = 1 THEN
        SET s_isCurrent = TRUE;
    ELSE
        SET s_isCurrent = FALSE;
    END IF;

    UPDATE laravel.partnerships
        SET name = s_name,
            link = s_link,
            image = s_image,
            isCurrent = s_isCurrent
    WHERE id = p_id;
END;

DROP PROCEDURE IF EXISTS DELETE_PARTNERSHIP;
CREATE PROCEDURE DELETE_PARTNERSHIP (IN p_id BIGINT)
BEGIN
    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    DELETE FROM laravel.partnerships WHERE id=p_id;
END;

DROP PROCEDURE IF EXISTS GET_TEAM_MEMBERS;
CREATE PROCEDURE GET_TEAM_MEMBERS (IN p_id INT, IN p_name LONGTEXT, IN p_role LONGTEXT, IN p_level INT, IN p_website LONGTEXT, IN p_telegram LONGTEXT, IN p_email LONGTEXT, IN p_linkedin LONGTEXT, IN p_image LONGTEXT)
BEGIN
    SELECT 
        id, 
        desanitize_string(name) AS name,
        desanitize_string(role) AS role,
        level,
        desanitize_string(website) AS website,
        desanitize_string(telegram) AS telegram,
        desanitize_string(email) AS email,
        desanitize_string(linkedin) AS linkedin,
        desanitize_string(image) AS image,
        created_at,
        updated_at
    FROM 
        laravel.team_members
    WHERE
        (p_id IS NULL OR id = p_id)
        AND (p_name IS NULL OR name = sanitize_string(p_name))
        AND (p_role IS NULL OR role = sanitize_string(p_role))
        AND (p_level IS NULL OR level = p_level)
        AND (p_website IS NULL OR website = sanitize_string(p_website))
        AND (p_telegram IS NULL OR telegram = sanitize_string(p_telegram))
        AND (p_email IS NULL OR email = sanitize_string(p_email))
        AND (p_linkedin IS NULL OR linkedin = sanitize_string(p_linkedin))
        AND (p_image IS NULL OR image = sanitize_string(p_image));
END;

DROP PROCEDURE IF EXISTS CREATE_TEAM_MEMBER;
CREATE PROCEDURE CREATE_TEAM_MEMBER (IN p_name LONGTEXT, IN p_role LONGTEXT, IN p_level INT, IN p_website LONGTEXT, IN p_telegram LONGTEXT, IN p_email LONGTEXT, IN p_linkedin LONGTEXT, IN p_image LONGTEXT)
BEGIN
    DECLARE s_image LONGTEXT;
    DECLARE s_name LONGTEXT;
    DECLARE s_role LONGTEXT;

    IF p_image IS NULL OR LENGTH(p_image) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Team Member content cannot be null or an empty string';
    END IF;

    IF p_name IS NULL OR LENGTH(p_name) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Team Member name cannot be null or an empty string';
    END IF;

    IF p_role IS NULL OR LENGTH(p_role) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Team Member role cannot be null or an empty string';
    END IF;

    IF p_level IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Team Member level cannot be null or an empty string';
    END IF;
   
    SET s_image = sanitize_string(p_image);
    SET s_name = sanitize_string(p_name);
    SET s_role = sanitize_string(p_role);
   
    INSERT INTO laravel.team_members (name, role, level, website, telegram, email, linkedin, image)
    VALUES (s_name, s_role, p_level, sanitize_string(p_website), sanitize_string(p_telegram), sanitize_string(p_email), sanitize_string(p_linkedin), s_image);
END;

DROP PROCEDURE IF EXISTS UPDATE_TEAM_MEMBER;
CREATE PROCEDURE UPDATE_TEAM_MEMBER (IN p_id INT, IN p_name LONGTEXT, IN p_role LONGTEXT, IN p_level INT, IN p_website LONGTEXT, IN p_telegram LONGTEXT, IN p_email LONGTEXT, IN p_linkedin LONGTEXT, IN p_image LONGTEXT)
BEGIN
    
    DECLARE s_name LONGTEXT;
    DECLARE s_role LONGTEXT;
    DECLARE s_level INT;
    DECLARE s_website LONGTEXT;
    DECLARE s_telegram LONGTEXT;
    DECLARE s_email LONGTEXT;
    DECLARE s_linkedin LONGTEXT;
    DECLARE s_image LONGTEXT;

    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    SET s_name = COALESCE(sanitize_string(p_name), '');
    SET s_role = COALESCE(sanitize_string(p_role), '');
    SET s_level = COALESCE(p_level, '');
    SET s_website = COALESCE(sanitize_string(p_website), '');
    SET s_telegram = COALESCE(sanitize_string(p_telegram), '');
    SET s_email = COALESCE(sanitize_string(p_email), '');
    SET s_linkedin = COALESCE(sanitize_string(p_linkedin), '');
    SET s_image = COALESCE(sanitize_string(p_image), '');
    
    IF LENGTH(s_name) = 0 THEN
        SELECT name INTO s_name FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_role) = 0 THEN
        SELECT role INTO s_role FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_level) = 0 THEN
        SELECT level INTO s_level FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_website) = 0 THEN
        SELECT website INTO s_website FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_telegram) = 0 THEN
        SELECT telegram INTO s_telegram FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_email) = 0 THEN
        SELECT email INTO s_email FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_linkedin) = 0 THEN
        SELECT linkedin INTO s_linkedin FROM laravel.team_members WHERE id=p_id;
    END IF;

    IF LENGTH(s_image) = 0 THEN
        SELECT image INTO s_image FROM laravel.team_members WHERE id=p_id;
    END IF;

    UPDATE laravel.team_members
        SET name = s_name,
            role = s_role,
            level = s_level,
            website = s_website,
            telegram = s_telegram,
            email = s_email,
            linkedin = s_linkedin,
            image = s_image
    WHERE id = p_id;
END;

DROP PROCEDURE IF EXISTS DELETE_TEAM_MEMBER;
CREATE PROCEDURE DELETE_TEAM_MEMBER (IN p_id BIGINT)
BEGIN
    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    DELETE FROM laravel.team_members WHERE id=p_id;
END;

DROP PROCEDURE IF EXISTS GET_SOCIALS;
CREATE PROCEDURE GET_SOCIALS (IN p_id INT, IN p_name LONGTEXT, IN p_text LONGTEXT, IN p_link LONGTEXT, IN p_icon LONGTEXT)
BEGIN
    SELECT 
        id, 
        desanitize_string(name) AS name,
        desanitize_string(text) AS text,
        desanitize_string(link) AS link,
        desanitize_string(icon) AS icon,
        created_at,
        updated_at
    FROM 
        laravel.socials
    WHERE
        (p_id IS NULL OR id = p_id)
        AND (p_name IS NULL OR name = sanitize_string(p_name))
        AND (p_text IS NULL OR text = sanitize_string(p_text))
        AND (p_link IS NULL OR link = sanitize_string(p_link))
        AND (p_icon IS NULL OR icon = sanitize_string(p_icon));
END;

DROP PROCEDURE IF EXISTS CREATE_SOCIAL;
CREATE PROCEDURE CREATE_SOCIAL (IN p_name LONGTEXT, IN p_text LONGTEXT, IN p_link LONGTEXT, IN p_icon LONGTEXT)
BEGIN
    DECLARE s_name LONGTEXT;
    DECLARE s_text LONGTEXT;
    DECLARE s_link LONGTEXT;
    DECLARE s_icon LONGTEXT;

    IF p_name IS NULL OR LENGTH(p_name) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Social name cannot be null or an empty string';
    END IF;

    IF p_text IS NULL OR LENGTH(p_text) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Social text cannot be null or an empty string';
    END IF;

    IF p_link IS NULL OR LENGTH(p_link) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Social link cannot be null or an empty string';
    END IF;

    IF p_icon IS NULL OR LENGTH(p_icon) = 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Social icon cannot be null or an empty string';
    END IF;
   
    SET s_name = sanitize_string(p_name);
    SET s_text = sanitize_string(p_text);
    SET s_link = sanitize_string(p_link);
    SET s_icon = sanitize_string(p_icon);
   
    INSERT INTO laravel.socials (name, text, link, icon)
    VALUES (s_name, s_text, s_link, s_icon);
END;

DROP PROCEDURE IF EXISTS UPDATE_SOCIAL;
CREATE PROCEDURE UPDATE_SOCIAL (IN p_id INT, IN p_name LONGTEXT, IN p_text LONGTEXT, IN p_link LONGTEXT, IN p_icon LONGTEXT)
BEGIN
    
    DECLARE s_name LONGTEXT;
    DECLARE s_text LONGTEXT;
    DECLARE s_link LONGTEXT;
    DECLARE s_icon LONGTEXT;

    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    SET s_name = COALESCE(sanitize_string(p_name), '');
    SET s_text = COALESCE(sanitize_string(p_text), '');
    SET s_link = COALESCE(sanitize_string(p_link), '');
    SET s_icon = COALESCE(sanitize_string(p_icon), '');
    
    IF LENGTH(s_name) = 0 THEN
        SELECT name INTO s_name FROM laravel.socials WHERE id=p_id;
    END IF;

    IF LENGTH(s_text) = 0 THEN
        SELECT text INTO s_text FROM laravel.socials WHERE id=p_id;
    END IF;

    IF LENGTH(s_link) = 0 THEN
        SELECT link INTO s_link FROM laravel.socials WHERE id=p_id;
    END IF;

    IF LENGTH(s_icon) = 0 THEN
        SELECT icon INTO s_icon FROM laravel.socials WHERE id=p_id;
    END IF;

    UPDATE laravel.socials
        SET name = s_name,
            text = s_text,
            link = s_link,
            icon = s_icon
    WHERE id = p_id;
END;

DROP PROCEDURE IF EXISTS DELETE_SOCIAL;
CREATE PROCEDURE DELETE_SOCIAL (IN p_id BIGINT)
BEGIN
    IF p_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ID cannot be null';
    END IF;

    DELETE FROM laravel.socials WHERE id=p_id;
END;