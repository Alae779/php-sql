CREATE TABLE cours(
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
level VARCHAR(50) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
image VARCHAR(200)
);


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







INSERT INTO cours (title, description, level, image)
VALUES
('Introduction au Développement Web',
 'Apprenez les bases de HTML, CSS et JavaScript pour créer vos premières pages web.',
 'Débutant',
 'images/web_dev_intro.jpg'),

('Programmation Java Avancée',
 'Approfondissez la programmation orientée objet, les structures de données et les frameworks Java.',
 'Avancé',
 'images/advanced_java.jpg'),

('Fondamentaux de la Data Science',
 'Découvrez les statistiques, l’analyse de données et l’utilisation de Python pour la data science.',
 'Intermédiaire',
 'images/data_science_fundamentals.jpg'),

('Bases de la Cybersécurité',
 'Apprenez à protéger les systèmes, réseaux et données contre les cybermenaces.',
 'Débutant',
 'images/cybersecurity_basics.jpg'),

('Machine Learning avec Python',
 'Introduction pratique aux algorithmes supervisés et non supervisés.',
 'Intermédiaire',
 'images/ml_python.jpg'),

('Développement Mobile avec Flutter',
 'Créez des applications mobiles multiplateformes avec le framework Flutter.',
 'Intermédiaire',
 'images/flutter_course.jpg'),

('Principes du Design UI/UX',
 'Explorez les principes de design, la création de wireframes et de prototypes.',
 'Débutant',
 'images/uiux_design.jpg'),

('Cloud Computing avec AWS',
 'Apprenez les services AWS, les méthodes de déploiement et l’architecture cloud.',
 'Avancé',
 'images/cloud_aws.jpg'),

('Conception de Bases de Données & SQL',
 'Maîtrisez les bases de données relationnelles, la normalisation et les requêtes SQL.',
 'Débutant',
 'images/database_sql.jpg'),

('DevOps & Pipeline CI/CD',
 'Automatisez les déploiements avec GitHub Actions, Docker et les pratiques CI/CD.',
 'Avancé',
 'images/devops_cicd.jpg');
