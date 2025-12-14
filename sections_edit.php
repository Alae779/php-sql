<?php
include "config.php";

if (isset($_GET['id'])) {
    $section_id = $_GET['id'];
    if (isset($_POST["enregistrer"])) {
        $newsectitle = $_POST['title'];
        $newseccontent = $_POST['content'];
        $newsecposition = $_POST['position'];

        $sql_5 = "UPDATE sections SET
            title = '$newsectitle',
            content = '$newseccontent',
            position = '$newsecposition'
            WHERE id = $section_id";

        $con->query($sql_5);
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Section - LMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Verdana', sans-serif;
            background: linear-gradient(to right, #fc5c7d, #6a82fb);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .content-wrapper {
            max-width: 800px;
            margin: 0 auto;
        }

        .top-navigation {
            background: white;
            padding: 1.3rem 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-title {
            font-size: 1.3rem;
            color: #2d3748;
            font-weight: bold;
        }

        .back-button {
            background: #fc5c7d;
            color: white;
            padding: 0.6rem 1.5rem;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .back-button:hover {
            background: #e04869;
            transform: scale(1.05);
        }

        .edit-form-box {
            background: white;
            padding: 2.8rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .header-zone {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px dashed #e2e8f0;
        }

        .page-heading {
            font-size: 2.2rem;
            color: #fc5c7d;
            margin-bottom: 0.6rem;
        }

        .page-description {
            color: #718096;
            font-size: 1rem;
        }

        .notice-box {
            background: #fef5e7;
            border-left: 5px solid #f39c12;
            padding: 1.2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }

        .notice-box p {
            color: #7d6608;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .field-container {
            margin-bottom: 2rem;
        }

        .field-title {
            display: block;
            color: #2d3748;
            font-weight: 700;
            margin-bottom: 0.8rem;
            font-size: 1.05rem;
        }

        .required-mark {
            color: #e53e3e;
            margin-left: 3px;
        }

        .text-field {
            width: 100%;
            padding: 1.1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f7fafc;
        }

        .text-field:focus {
            outline: none;
            border-color: #fc5c7d;
            background: white;
            box-shadow: 0 0 0 3px rgba(252, 92, 125, 0.1);
        }

        .content-textarea {
            width: 100%;
            padding: 1.1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            resize: vertical;
            min-height: 180px;
            transition: all 0.3s;
            background: #f7fafc;
        }

        .content-textarea:focus {
            outline: none;
            border-color: #fc5c7d;
            background: white;
            box-shadow: 0 0 0 3px rgba(252, 92, 125, 0.1);
        }

        .position-input {
            width: 100%;
            padding: 1.1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f7fafc;
        }

        .position-input:focus {
            outline: none;
            border-color: #fc5c7d;
            background: white;
            box-shadow: 0 0 0 3px rgba(252, 92, 125, 0.1);
        }

        .help-message {
            display: block;
            margin-top: 0.6rem;
            font-size: 0.88rem;
            color: #718096;
            font-style: italic;
        }

        .action-buttons {
            display: flex;
            gap: 1.2rem;
            margin-top: 2.8rem;
            padding-top: 2rem;
            border-top: 2px solid #e2e8f0;
        }

        .save-button {
            flex: 2;
            background: linear-gradient(to right, #fc5c7d, #6a82fb);
            color: white;
            padding: 1.2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .save-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(252, 92, 125, 0.4);
        }

        .discard-button {
            flex: 1;
            background: white;
            color: #e53e3e;
            padding: 1.2rem;
            border: 2px solid #e53e3e;
            border-radius: 10px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .discard-button:hover {
            background: #e53e3e;
            color: white;
        }

        @media (max-width: 768px) {
            .edit-form-box {
                padding: 1.8rem;
            }

            .top-navigation {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <?php
    $sql_4 = "SELECT * FROM sections WHERE id = $section_id";
    $resultsec = $con->query($sql_4);
    $sec = mysqli_fetch_assoc($resultsec);
    ?>
    <div class="content-wrapper">
        <div class="top-navigation">
            <h2 class="nav-title">✏️ Modification de Section</h2>
            <a href="sections_by_courses.php" class="back-button">← Retour au cours</a>
        </div>

        <div class="edit-form-box">
            <div class="header-zone">
                <h1 class="page-heading">Modifier la Section</h1>
                <p class="page-description">Mettez à jour les informations de cette section</p>
            </div>

            <div class="notice-box">
                <p><strong>⚠️ Attention :</strong> La modification de la position peut réorganiser l'ordre des sections dans le cours. Assurez-vous que la nouvelle position est correcte.</p>
            </div>

            <form method="POST">

                <div class="field-container">
                    <label for="title-input" class="field-title">
                        Titre de la section<span class="required-mark">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title-input" 
                        name="title" 
                        class="text-field" 
                        value="<?= $sec['title'] ?>"
                        required
                    >
                    <small class="help-message">Modifiez le titre si nécessaire</small>
                </div>

                <div class="field-container">
                    <label for="content-input" class="field-title">
                        Contenu de la section<span class="required-mark">*</span>
                    </label>
                    <textarea 
                        id="content-input" 
                        name="content" 
                        class="content-textarea" 
                        required
                    ><?= $sec['content'] ?></textarea>
                    <small class="help-message">Mettez à jour le contenu pédagogique</small>
                </div>

                <div class="field-container">
                    <label for="position-input" class="field-title">
                        Position dans le cours<span class="required-mark">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="position-input" 
                        name="position" 
                        class="position-input" 
                        value="<?= $sec['position'] ?>"
                        min="1"
                        required
                    >
                    <small class="help-message">Changez la position pour réorganiser les sections (1, 2, 3...)</small>
                </div>

                <div class="action-buttons">
                    <button type="submit" class="save-button" name="enregistrer">
                        💾 Enregistrer les modifications
                    </button>
                    <button type="button" class="discard-button" onclick="window.history.back()">
                        ✕ Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>