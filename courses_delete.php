<?php
include "config.php";
    if(isset($_GET['id'])){
        $cours_id = $_GET['id'];
        $sql_6 = "SELECT * FROM cours where id = $cours_id";
        $result = $con->query($sql_6);
        $course_delete = mysqli_fetch_assoc($result);

        $sql_2 = "SELECT * FROM sections WHERE course_id = $cours_id";
        $resultatsec = $con->query($sql_2);
        $sections = mysqli_fetch_all($resultatsec,MYSQLI_ASSOC);

        if(isset($_POST["delete"])){
            $sql_7 = "DELETE FROM cours WHERE id = $cours_id";
            $results = $con->query($sql_7);
            // $cours_delete = mysqli_fetch_assoc($results);
            header("Location: courses_list.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer le Cours - LMS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .delete-wrapper {
            max-width: 700px;
            width: 100%;
        }

        .confirmation-box {
            background: white;
            border-radius: 20px;
            padding: 3.5rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .danger-stripe {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(to right, #e74c3c, #c0392b);
        }

        .icon-danger {
            font-size: 6rem;
            margin-bottom: 1.5rem;
            margin-top: 1rem;
            animation: shake 3s infinite;
        }

        @keyframes shake {
            0%, 100% {
                transform: rotate(0deg);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: rotate(-5deg);
            }
            20%, 40%, 60%, 80% {
                transform: rotate(5deg);
            }
        }

        .danger-title {
            font-size: 2.3rem;
            color: #c0392b;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .danger-description {
            color: #555;
            font-size: 1.15rem;
            line-height: 1.9;
            margin-bottom: 2.5rem;
        }

        .course-details-box {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: left;
            border: 3px solid #f39c12;
        }

        .detail-row {
            margin-bottom: 1.2rem;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-key {
            font-weight: bold;
            color: #2c3e50;
            display: block;
            margin-bottom: 0.4rem;
            font-size: 1rem;
        }

        .detail-content {
            color: #34495e;
            font-size: 1rem;
            line-height: 1.7;
        }

        .divider-line {
            height: 2px;
            background: linear-gradient(to right, transparent, #f39c12, transparent);
            margin: 1.2rem 0;
        }

        .level-badge-display {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .badge-beginner {
            background: #2ecc71;
            color: white;
        }

        .badge-intermediate {
            background: #f39c12;
            color: white;
        }

        .badge-advanced {
            background: #e74c3c;
            color: white;
        }

        .impact-warning {
            background: #ffebee;
            border: 3px dashed #c0392b;
            padding: 1.3rem;
            border-radius: 12px;
            margin-bottom: 2.5rem;
        }

        .impact-warning p {
            color: #c0392b;
            font-weight: 700;
            font-size: 1.05rem;
            line-height: 1.6;
        }

        .button-container {
            display: flex;
            gap: 1.2rem;
        }

        .delete-confirm-btn {
            flex: 1;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 1.4rem;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
        }

        .delete-confirm-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.5);
        }

        .keep-course-form {
            flex: 1;
        }

        .keep-course-btn {
            width: 100%;
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
            padding: 1.4rem;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
        }

        .keep-course-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(39, 174, 96, 0.5);
        }

        @media (max-width: 768px) {
            .confirmation-box {
                padding: 2.5rem 1.5rem;
            }

            .button-container {
                flex-direction: column-reverse;
            }

            .danger-title {
                font-size: 1.8rem;
            }

            .icon-danger {
                font-size: 4rem;
            }
        }
    </style>
</head>
<body>
    
    
    <div class="delete-wrapper">
        <div class="confirmation-box">
            <div class="danger-stripe"></div>
            
            <div class="icon-danger">🚨</div>
            
            <h1 class="danger-title">Attention : Suppression Définitive</h1>
            
            <p class="danger-description">
                Vous êtes sur le point de supprimer définitivement ce cours. 
                Cette action est <strong>irréversible</strong> et aura des conséquences importantes.
            </p>

            <div class="course-details-box">
                <div class="detail-row">
                    <span class="detail-key">📚 Titre du cours :</span>
                    <p class="detail-content"><?= $course_delete['title'] ?></p>
                </div>
                
                <div class="divider-line"></div>
                
                <div class="detail-row">
                    <span class="detail-key">📝 Description :</span>
                    <p class="detail-content"><?= $course_delete['description'] ?></p>
                </div>
                
                <div class="divider-line"></div>
                
                <div class="detail-row">
                    <span class="detail-key">📊 Niveau :</span>
                    <p class="detail-content">
                        <span class="level-badge-display">
                            <?php 
                                if($course_delete['level'] == 'Débutant') echo '🟢 Débutant';
                                elseif($course_delete['level'] == 'Intermédiaire') echo '🟡 Intermédiaire';
                                else echo '🔴 Avancé';
                            ?>
                        </span>
                    </p>
                </div>
                
                <div class="divider-line"></div>
                
                <div class="detail-row">
                    <span class="detail-key">📖 Sections associées :</span>
                    <?php
                    foreach($sections as $section){
                    ?>
                    <p class="detail-content"><?= $section['title'] ?></p>
                    <?php } ?>
                </div>
                
            </div>

            <div class="impact-warning">
                <p>
                    ⚡ <strong>IMPACT CRITIQUE :</strong> Ce cours, ses <?= count($sections) ?> sections et toutes les données associées 
                    seront définitivement supprimés de la base de données.
            </div>

            <div class="button-container">
                <form method="POST" action="courses_list.php" class="keep-course-form">
                    <button type="submit" class="keep-course-btn">
                        ✓ Non, garder le cours
                    </button>
                </form>
                
                <form method="POST" style="flex: 1;">
                    <button type="submit" class="delete-confirm-btn" name="delete">
                        🗑️ Oui, supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>