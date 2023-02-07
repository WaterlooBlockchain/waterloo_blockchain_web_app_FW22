DELIMITER //

CREATE PROCEDURE 
	Create_blog_post /*Routine Name*/
	(				 /*Parameter list*/
		title TEXT,
		isFeatured BOOL,
		tags TEXT,
		content TEXT,
		image LONGTEXT
	)  
MODIFIES SQL DATA /* Data access clause */
BEGIN /*Routine body*/
	INSERT INTO laravel.blog_posts(title, isFeatured, tags, content, image)
	VALUES(title , isFeatured, tags, content, image);
END

//

DELIMITER ;


