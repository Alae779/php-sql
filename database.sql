CREATE TABLE cours(
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
level VARCHAR(50) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
));


CREATE TABLE sections(
id INT AUTO_INCREMENT PRIMARY KEY,
course_id INT,
title VARCHAR(50) NOT NULL,
content TEXT NOT NULL,
position INT NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (course_id) REFERENCES cours(id) ON DELETE CASCADE,
CONSTRAINT cours_position UNIQUE(course_id, position)
);

INSERT INTO cours (title, description, level)
VALUES 
('HTML Basics', 'Learn the fundamentals of HTML.', 'Beginner'),
('CSS Design', 'Understand how to style websites using CSS.', 'Intermediate'),
('Advanced JavaScript', 'Deep dive into JS concepts like async programming.', 'Advanced');
