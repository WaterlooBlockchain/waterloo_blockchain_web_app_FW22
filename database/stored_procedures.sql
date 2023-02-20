DELIMITER $$

CREATE PROCEDURE CREATE_BLOG_POST (IN p_title TEXT, IN p_isFeatured BOOL, IN p_tags TEXT, IN p_content TEXT, IN p_image LONGTEXT)
BEGIN
SET @title = sanitize_input(p_title);
SET @tags = sanitize_input(p_tags);
SET @content = sanitize_input(p_content);
SET @image = sanitize_input(p_image);

INSERT INTO laravel.blog_posts (title, is_featured, tags, content, image)
VALUES (@title, p_isFeatured, @tags, @content, @image);
END $$

DELIMITER ;