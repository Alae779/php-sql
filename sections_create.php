<?php
    include "config.php";
    
    if(isset($_GET["id"])){
        $position_nbr = 0;
        $course_id = 0;
        $course_id = $_GET['id'];
        $sql_2 = "SELECT * FROM sections WHERE course_id = $course_id";
        $resultatsec = $con->query($sql_2);
        $sections = mysqli_fetch_all($resultatsec,MYSQLI_ASSOC);
        $position_nbr = count($sections) + 1;
        if(isset($_POST["add_sec"])){
            $sec_title = $_POST["title"];
            $sec_content = $_POST["content"]; 
            $sec_position = $_POST["position"];
            $sql_3 = "INSERT INTO sections(course_id , title , content , position)
                        VALUES($course_id ,'$sec_title' , '$sec_content' , '$sec_position')";
            $con->query($sql_3);
        }
        $sql_10 = "SELECT * FROM cours WHERE id = $course_id";
        $resultatsec = $con->query($sql_10);
        $course = mysqli_fetch_assoc($resultatsec);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Section - LMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Trebuchet MS', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .wrapper {
            max-width: 750px;
            margin: 0 auto;
        }

        .navigation-bar {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.2rem 1.8rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
        }

        .return-link {
            background: #667eea;
            color: white;
            padding: 0.6rem 1.3rem;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .return-link:hover {
            background: #5568d3;
            transform: scale(1.05);
        }

        .current-course {
            color: #4a5568;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .form-container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .form-title-section {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid #e2e8f0;
        }

        .main-heading {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        .subtitle-text {
            color: #718096;
            font-size: 0.95rem;
        }

        .form-field {
            margin-bottom: 1.8rem;
        }

        .label-text {
            display: block;
            color: #2d3748;
            font-weight: 700;
            margin-bottom: 0.7rem;
            font-size: 1rem;
        }

        .asterisk {
            color: #f56565;
            margin-left: 4px;
        }

        .input-text {
            width: 100%;
            padding: 1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
        }

        .input-text:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .textarea-field {
            width: 100%;
            padding: 1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            resize: vertical;
            min-height: 150px;
            transition: all 0.3s;
        }

        .textarea-field:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .number-field {
            width: 100%;
            padding: 1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
        }

        .number-field:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .hint-text {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #718096;
        }

        .alert-info {
            background: #bee3f8;
            border-left: 5px solid #3182ce;
            padding: 1.2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }

        .alert-info p {
            color: #2c5282;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .buttons-row {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .submit-btn {
            flex: 2;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.1rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .cancel-btn {
            flex: 1;
            background: white;
            color: #718096;
            padding: 1.1rem;
            border: 2px solid #cbd5e0;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .cancel-btn:hover {
            background: #f7fafc;
            border-color: #a0aec0;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 1.5rem;
            }

            .navigation-bar {
                flex-direction: column;
                text-align: center;
            }

            .buttons-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="navigation-bar">
            <a href="sections_by_courses.php" class="return-link">← Retour</a>
            <span class="current-course">📚 Cours : <?= $course['title'] ?></span>
        </div>

        <div class="form-container">
            <div class="form-title-section">
                <h1 class="main-heading">➕ Ajouter une Section</h1>
                <p class="subtitle-text">Complétez les informations pour créer une nouvelle section dans ce cours</p>
            </div>

            <div class="alert-info">
                <p><strong>💡 Conseil :</strong> Structurez votre contenu de manière logique. La position détermine l'ordre d'affichage dans le cours (1 pour la première section, 2 pour la deuxième, etc.).</p>
            </div>

            <form method="POST">
                <!-- Hidden field for course_id -->
                <input type="hidden" name="course_id" value="1">

                <div class="form-field">
                    <label for="section-title" class="label-text">
                        Titre de la section<span class="asterisk">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="section-title" 
                        name="title" 
                        class="input-text" 
                        placeholder="Ex: Chapitre 5 - Les Tableaux en PHP"
                        required
                    >
                    <small class="hint-text">Donnez un titre clair et descriptif à votre section</small>
                </div>

                <div class="form-field">
                    <label for="section-content" class="label-text">
                        Contenu de la section<span class="asterisk">*</span>
                    </label>
                    <textarea 
                        id="section-content" 
                        name="content" 
                        class="textarea-field" 
                        placeholder="Décrivez le contenu de cette section : objectifs, concepts abordés, exercices..."
                        required
                    ></textarea>
                    <small class="hint-text">Soyez détaillé pour aider les étudiants à comprendre ce qu'ils vont apprendre</small>
                </div>

                <div class="form-field">
                    <label for="section-position" class="label-text">
                        Position dans le cours<span class="asterisk">*</span>
                    </label>
                    <input 
                        type="number" 
                        id="section-position" 
                        name="position" 
                        class="number-field" 
                        value="<?= $position_nbr ?>"
                        min="1"
                        required
                    >
                    <small class="hint-text">Numéro d'ordre de la section (1, 2, 3...). Les sections seront affichées selon cet ordre.</small>
                </div>

                <div class="buttons-row">
                    <button type="submit" class="submit-btn" name = "add_sec">
                        ✓ Créer la section
                    </button>
                    <button type="button" class="cancel-btn" onclick="window.history.back()">
                        ✕ Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>