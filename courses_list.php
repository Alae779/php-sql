<?php
include "config.php";
    $sql = "SELECT * FROM cours";
    $resultat = $con->query($sql);
    $courses = mysqli_fetch_all($resultat,MYSQLI_ASSOC);
    $debutant = 0;
    $avance = 0;
    $intermediaire = 0;
    foreach($courses as $cours){
        if($cours['level'] == 'Débutant') $debutant++;
        else if($cours['level'] == 'Avancé') $avance++;
        else if($cours['level'] == 'Intermédiaire') $intermediaire++;
    }
    function level($string){
        if($string == 'Débutant') return '🟢 Débutant';
        else if($string == 'Avancé') return '🔴 Avancé';
        else if($string == 'Intermédiaire') return '🟡 Intermédiaire';
    }
    $sql = "SELECT * FROM sections";
    $resultat = $con->query($sql);
    $sections = mysqli_fetch_all($resultat,MYSQLI_ASSOC);
?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours - LMS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-title {
            font-size: 2.2rem;
            font-weight: bold;
        }

        .home-button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.7rem 1.5rem;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            border: 2px solid white;
        }

        .home-button:hover {
            background: white;
            color: #667eea;
        }

        .toolbar {
            background: white;
            padding: 1.5rem 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .toolbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 30px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .level-filter {
            padding: 0.8rem 1.2rem;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 0.95rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .level-filter:focus {
            outline: none;
            border-color: #667eea;
        }

        .create-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.8rem 2rem;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            display: inline-block;
        }

        .create-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .content-area {
            padding: 2rem 0;
        }

        .statistics {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            flex: 1;
            min-width: 200px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }

        .stat-label {
            color: #666;
            margin-top: 0.5rem;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .course-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.5rem;
            position: relative;
        }

        .level-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.3);
        }

        .course-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }

        .course-meta {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .course-body {
            padding: 1.5rem;
        }

        .course-description {
            color: #555;
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-stats {
            display: flex;
            gap: 1.5rem;
            padding: 1rem 0;
            border-top: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 1rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.8rem;
        }

        .view-btn {
            flex: 1;
            background: #667eea;
            color: white;
            padding: 0.7rem;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
        }

        .view-btn:hover {
            background: #5568d3;
        }

        .edit-btn {
            background: #f39c12;
            color: white;
            padding: 0.7rem 1rem;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
        }

        .edit-btn:hover {
            background: #e67e22;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
            padding: 0.7rem 1rem;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .empty-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .empty-text {
            color: #666;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .toolbar-content {
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="header-section">
        <div class="container">
            <div class="header-content">
                <h1 class="main-title">📚 Liste des Cours</h1>
                <a href="index.php" class="home-button">🏠 Accueil</a>
            </div>
        </div>
    </div>

    <div class="toolbar">
        <div class="container">
            <div class="toolbar-content">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Rechercher un cours..." id="searchInput">
                </div>
                <div class="filter-group">
                    <a href="courses_create.php" class="create-button">+ Nouveau Cours</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container content-area">
        <div class="statistics">
            <div class="stat-card">
                <div class="stat-value"><?= count($courses) ?></div>
                <div class="stat-label">Cours actifs</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $debutant ?></div>
                <div class="stat-label">Cours Débutant</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $avance ?></div>
                <div class="stat-label">Cours Intermédiaire</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?= $intermediaire ?></div>
                <div class="stat-label">Cours Avancé</div>
            </div>
        </div>

        <!-- Example: No courses -->
        <!-- <div class="empty-state">
            <div class="empty-icon">📭</div>
            <h2 class="empty-title">Aucun cours disponible</h2>
            <p class="empty-text">Commencez par créer votre premier cours pour la plateforme</p>
            <a href="courses_create.php" class="create-button">+ Créer un cours</a>
        </div> -->

        <!-- Courses Grid -->
         
            <div class="courses-grid">
                

                <!-- Course Card 4 -->
                <?php
         foreach($courses as $dt){
            $sec_count = 0;
            foreach($sections as $section){
                if($section['course_id'] == $dt['id']) $sec_count ++;
            }

         ?>

                    <div class="course-card">
                        <div class="course-header">
                            <span class="level-badge"><?= level($dt['level']) ?></span>
                            <p class="course-id">ID : <?= $dt['id'] ?></p>
                            <h3 class="course-title"><?= $dt['title'] ?></h3>
                            <p class="course-meta">📅 <?= $dt['created_at'] ?></p>
                        </div>
                        <div class="course-body">
                            <p class="course-description">
                                <?= $dt['description'] ?>
                            </p>
                            <div class="course-stats">
                                <div class="stat-item">
                                    <span>📝</span>
                                    <span><?= $sec_count ?> Sections</span>
                                </div>
                            </div>
                            <div class="action-buttons">
                                <a href="courses_edit.php?id=<?= $dt['id'] ?>" class="edit-btn">✏️ Modifier</a>
                                <a href="courses_delete.php?id=<?= $dt['id'] ?>" class="delete-btn">🗑️ Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </div>
            <?php include 'footer.php' ?>

    
</body>
</html>