<?php
    include "config.php";
    if(isset($_GET["id"])){
    $sec_id = $_GET['id'];
    $sql_2 = "SELECT * FROM sections WHERE id = $sec_id";
    $resultatsec = $con->query($sql_2);
    $section = mysqli_fetch_assoc($resultatsec);
    if(isset($_POST["delete"])){
        $sql = "DELETE FROM sections WHERE id=$sec_id";
        $con->query($sql);
        header("Location: sections_by_courses.php");
        exit();
    }
}
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer la Section - LMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .deletion-container {
            max-width: 600px;
            width: 100%;
        }

        .warning-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .warning-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .alert-title {
            font-size: 2rem;
            color: #e53e3e;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .alert-message {
            color: #4a5568;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .section-info-box {
            background: #f7fafc;
            border-left: 5px solid #e53e3e;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: left;
        }

        .info-label {
            font-weight: bold;
            color: #2d3748;
            display: block;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.6;
        }

        .separator-line {
            height: 1px;
            background: #e2e8f0;
            margin: 1.2rem 0;
        }

        .confirmation-text {
            background: #fff5f5;
            border: 2px dashed #e53e3e;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            color: #742a2a;
            font-weight: 600;
        }

        .button-group {
            display: flex;
            gap: 1rem;
        }

        .confirm-delete-btn {
            flex: 1;
            background: #e53e3e;
            color: white;
            padding: 1.2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .confirm-delete-btn:hover {
            background: #c53030;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(229, 62, 62, 0.4);
        }

        .cancel-action-form {
            flex: 1;
        }

        .cancel-action-btn {
            width: 100%;
            background: #48bb78;
            color: white;
            padding: 1.2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .cancel-action-btn:hover {
            background: #38a169;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(72, 187, 120, 0.4);
        }

        @media (max-width: 768px) {
            .warning-card {
                padding: 2rem;
            }

            .button-group {
                flex-direction: column-reverse;
            }

            .alert-title {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    
    
    <div class="deletion-container">
        <div class="warning-card">
            <div class="warning-icon">⚠️</div>
            <h1 class="alert-title">Confirmation de Suppression</h1>
            <p class="alert-message">
                Vous êtes sur le point de supprimer définitivement cette section. 
                Cette action est <strong>irréversible</strong> et toutes les données seront perdues.
            </p>

            <div class="section-info-box">
                <span class="info-label">🔴 Id de la section :</span>
                <p class="info-value"><?= $section['id'] ?></p>

                <div class="separator-line"></div>

                <span class="info-label">📝 Titre de la section :</span>
                <p class="info-value"><?= $section['title'] ?></p>
                
                <div class="separator-line"></div>
                
                <span class="info-label">📖 Contenu :</span>
                <p class="info-value"><?= $section['content'] ?></p>
                
                <div class="separator-line"></div>
                
                <span class="info-label">📍 Position :</span>
                <p class="info-value">Position #<?= $section['position'] ?></p>
            </div>

            <div class="confirmation-text">
                ⚡ Cette section sera définitivement supprimée de la base de données
            </div>

            <div class="button-group">
                <form action="sections_by_courses.php" class="cancel-action-form">
                    <button type="submit" class="cancel-action-btn">
                        ← Non, annuler
                    </button>
                </form>
                
                <form method="POST">
                    <button name="delete" type="submit" class="confirm-delete-btn">
                        🗑️ Oui, supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>