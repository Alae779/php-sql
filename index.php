<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme LMS - Gestion des Cours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'config.php' ?>
    <?php include 'header.php' ?>

    <section class="hero">
        <h1>Bienvenue sur votre Plateforme LMS</h1>
        <p>Gérez vos cours et sections de manière simple et efficace</p>
    </section>

    <div class="stats">
        <div class="stat-item">
            <span class="stat-number">50+</span>
            <span class="stat-label">Cours disponibles</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">200+</span>
            <span class="stat-label">Sections créées</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">1000+</span>
            <span class="stat-label">Étudiants actifs</span>
        </div>
    </div>

    <div class="cards-container">
        <div class="card">
            <div class="card-icon">📖</div>
            <h2>Gérer les Cours</h2>
            <p>Créez, modifiez et organisez vos cours selon vos besoins pédagogiques. Interface intuitive et facile à utiliser.</p>
            <a href="courses_list.php" class="btn">Voir les cours</a>
        </div>

        <div class="card">
            <div class="card-icon">📝</div>
            <h2>Gérer les Sections</h2>
            <p>Organisez le contenu de vos cours en sections claires et structurées pour une meilleure expérience d'apprentissage.</p>
            <a href="sections_by_courses.php" class="btn">Voir les sections</a>
        </div>

        <div class="card">
            <div class="card-icon">➕</div>
            <h2>Créer un Cours</h2>
            <p>Démarrez un nouveau cours en quelques clics. Définissez le titre, la description et le niveau de difficulté.</p>
            <a href="courses_create.php" class="btn">Nouveau cours</a>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>
</html>