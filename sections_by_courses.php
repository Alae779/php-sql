<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sections par Cours - LMS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(to bottom right, #4a5568, #2d3748);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .page-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .breadcrumb {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
        }

        .breadcrumb a {
            color: #90cdf4;
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: white;
        }

        .page-header {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .main-page-title {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .course-block {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .course-header-section {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid #e2e8f0;
        }

        .course-info {
            flex: 1;
        }

        .course-title-text {
            font-size: 1.8rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .course-level-tag {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            margin-right: 1rem;
        }

        .tag-beginner {
            background: #c6f6d5;
            color: #22543d;
        }

        .tag-intermediate {
            background: #feebc8;
            color: #7c2d12;
        }

        .tag-advanced {
            background: #fed7d7;
            color: #742a2a;
        }

        .course-description {
            color: #4a5568;
            line-height: 1.6;
            margin-top: 1rem;
        }

        .add-section-form {
            display: inline-block;
        }

        .add-section-btn {
            background: #48bb78;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .add-section-btn:hover {
            background: #38a169;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(72, 187, 120, 0.3);
        }

        .sections-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .section-card {
            background: #f7fafc;
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
        }

        .section-card:hover {
            border-color: #667eea;
            box-shadow: 0 3px 10px rgba(102, 126, 234, 0.2);
        }

        .section-top-bar {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .position-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.3rem 0.7rem;
            border-radius: 6px;
            font-weight: bold;
            font-size: 0.85rem;
        }

        .section-title-text {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .section-body {
            padding: 1.5rem;
        }

        .section-content-text {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 1.2rem;
        }

        .section-button-group {
            display: flex;
            gap: 0.8rem;
        }

        .edit-section-form,
        .delete-section-form {
            flex: 1;
        }

        .edit-section-btn {
            width: 100%;
            background: #ed8936;
            color: white;
            padding: 0.7rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .edit-section-btn:hover {
            background: #dd6b20;
        }

        .delete-section-btn {
            width: 100%;
            background: #f56565;
            color: white;
            padding: 0.7rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .delete-section-btn:hover {
            background: #e53e3e;
        }

        .no-sections-alert {
            background: #fff5f5;
            border-left: 4px solid #f56565;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: #742a2a;
        }
        @media (max-width: 768px) {
            .course-header-section {
                flex-direction: column;
                gap: 1rem;
            }

            .section-button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<?php
    include 'config.php';
    $sql = "SELECT * FROM cours";
    $resultat = $con->query($sql);
    $courses = mysqli_fetch_all($resultat,MYSQLI_ASSOC);

    $sql_2 = "SELECT * FROM sections";
    $resultatsec = $con->query($sql_2);
    $sections = mysqli_fetch_all($resultatsec,MYSQLI_ASSOC);
?>
<body>
    <div class="page-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="index.php">🏠 Accueil</a>
            <span>/</span>
            <a href="courses_list.php">📚 Cours</a>
            <span>/</span>
            <span>Sections par Cours</span>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <h1 class="main-page-title">📖 Sections par Cours</h1>
            <p class="page-subtitle">Gérez les sections de chaque cours de la plateforme</p>
        </div>

        <!-- Course 1: Introduction à PHP 8 -->
         <?php
                foreach($courses as $course){
            ?>
        <div class="course-block">

            

            <div class="course-header-section">
                <div class="course-info">
                    <h2 class="course-title-text"><?= $course['title'] ?></h2>
                    <span class="course-level-tag tag-beginner"><?= ($course['level']) ?></span>
                    <span style="color: #718096; font-size: 0.9rem;">📅 <?= $course['created_at'] ?></span>
                    <p class="course-description">
                        <?= $course['description'] ?>
                    </p>
                </div>
                <form method="POST" action="sections_create.php?id=<?= $course['id'] ?>" class="add-section-form">
                    <input type="hidden" name="course_id" value="1">
                    <button type="submit" class="add-section-btn">+ Ajouter Section</button>
                </form>
            </div>

            <div class="sections-wrapper">
                <!-- Section 1 -->
                 <?php
                    foreach($sections as $section){
                        if($course['id'] == $section['course_id']){
                 ?>
                <div class="section-card">
                    <div class="section-top-bar">
                        <div>
                            <span class="position-badge">Position <?= $section['position'] ?></span>
                            <h3 class="section-title-text"><?= $section['title'] ?></h3>
                        </div>
                    </div>
                    <div class="section-body">
                        <p class="section-content-text">
                            <?= $section['content'] ?>
                        </p>
                        <div class="section-button-group">
                            <form method="POST" action="sections_edit.php?id=<?= $section['id'] ?>" class="edit-section-form">
                                <input type="hidden" name="id" value="1">
                                <input type="hidden" name="course_id" value="1">
                                <button type="submit" class="edit-section-btn">✏️ Modifier</button>
                            </form>
                            <form method="POST" action="sections_delete.php?id=<?= $section['id'] ?>" class="delete-section-form">
                                <input type="hidden" name="id" value="1">
                                <input type="hidden" name="course_id" value="1">
                                <button type="submit" class="delete-section-btn">🗑️ Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
            
        </div>
                    <?php } ?>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>