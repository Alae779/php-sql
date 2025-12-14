<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau cours - LMS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .top-bar {
            background-color: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.8rem;
            color: #1e3c72;
            font-weight: bold;
        }

        .back-link {
            text-decoration: none;
            color: #2a5298;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border: 2px solid #2a5298;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .back-link:hover {
            background-color: #2a5298;
            color: white;
        }

        .form-wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-header h2 {
            color: #1e3c72;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #666;
            font-size: 0.95rem;
        }

        .section-divider {
            border: none;
            border-top: 2px solid #e0e0e0;
            margin: 2.5rem 0;
        }

        .section-heading {
            color: #1e3c72;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-left: 1rem;
            border-left: 4px solid #2a5298;
        }

        .input-group {
            margin-bottom: 1.8rem;
        }

        .field-label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
        }

        .required-star {
            color: #e74c3c;
            margin-left: 3px;
        }

        .text-input {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        .text-input:focus {
            outline: none;
            border-color: #2a5298;
        }

        .textarea-input {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
            font-family: inherit;
            resize: vertical;
            min-height: 120px;
        }

        .textarea-input:focus {
            outline: none;
            border-color: #2a5298;
        }

        .select-input {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
            font-family: inherit;
            background-color: white;
            cursor: pointer;
        }

        .select-input:focus {
            outline: none;
            border-color: #2a5298;
        }

        .number-input {
            width: 100%;
            padding: 0.9rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        .number-input:focus {
            outline: none;
            border-color: #2a5298;
        }

        .helper-text {
            font-size: 0.85rem;
            color: #777;
            margin-top: 0.4rem;
        }

        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .submit-button {
            flex: 1;
            padding: 1rem;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(42, 82, 152, 0.3);
        }

        .reset-button {
            flex: 1;
            padding: 1rem;
            background: white;
            color: #e74c3c;
            border: 2px solid #e74c3c;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .reset-button:hover {
            background: #e74c3c;
            color: white;
        }

        .info-box {
            background-color: #e8f4f8;
            border-left: 4px solid #2a5298;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 5px;
        }

        .info-box p {
            color: #1e3c72;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .sections-container {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            margin-top: 2rem;
        }

        .section-item {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 2px solid #e0e0e0;
        }

        .section-item-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .section-number {
            background: #2a5298;
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 5px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .remove-section-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 0.4rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background 0.3s;
        }

        .remove-section-btn:hover {
            background: #c0392b;
        }

        .add-section-btn {
            width: 100%;
            padding: 1rem;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 1rem;
        }

        .add-section-btn:hover {
            background: #229954;
        }

        .image-upload-container {
        margin: 20px 0;
        font-family: Arial, sans-serif;
        }

        .label-title {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="file"] {
            padding: 8px;
            font-size: 1rem;
        }

        .preview-box {
            margin-top: 15px;
            width: 250px;
            height: 180px;
            border: 2px dashed #aaa;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f8f8f8;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }


        @media (max-width: 768px) {
            .form-wrapper {
                padding: 2rem 1.5rem;
            }

            .top-bar {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .button-group {
                flex-direction: column;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .sections-container {
                padding: 1rem;
            }
        }
    </style>
<script src="script.js" defer></script>
</head>

            <?php
                include 'config.php';
                if(isset($_POST["creer"])){
                    $titre = $_POST["title"];
                    $description = $_POST["description"];
                    $level= $_POST["level"];
                    
                    $sec_title = $_POST["section_titles"];
                    $sec_content = $_POST["section_contents"]; 
                    $sec_position = $_POST["section_positions"]; 
                
                if(!empty($titre) && !empty($description) && !empty($level) && !empty($sec_title) && !empty($sec_content) && !empty($sec_position)){
                    $sql= "INSERT INTO cours(title , description , level)
                              VALUES('$titre' , '$description' , '$level')  ";
                    $con->query($sql);
                    $current_id = 0;
                    $current_id = $con->insert_id;
                    $count = count($sec_content);
                    for($i = 0 ; $i < $count ; $i++){
                        $sql_2 = "INSERT INTO sections(course_id , title , content , position)
                                  VALUES($current_id ,'$sec_title[$i]' , '$sec_content[$i]' , '$sec_position[$i]')";
                        $con->query($sql_2);
                    }
                }
            }

            ?>

<body>
    <div class="top-bar">
        <h1 class="page-title">📚 Nouveau Cours</h1>
        <a href="courses_list.php" class="back-link">← Retour à la liste</a>
    </div>

    <div class="form-wrapper">
        <div class="form-header">
            <h2>Créer un nouveau cours</h2>
            <p>Remplissez les informations ci-dessous pour ajouter un cours à la plateforme</p>
        </div>

        <div class="info-box">
            <p>💡 <strong>Astuce :</strong> Assurez-vous de fournir un titre clair et une description détaillée pour aider les étudiants à comprendre le contenu du cours.</p>
        </div>

        <form method="POST" action="courses_create.php">
            <!-- Informations du Cours -->
            <h3 class="section-heading">📖 Informations du Cours</h3>

            <div class="input-group">
                <label for="course-title" class="field-label">
                    Titre du cours<span class="required-star">*</span>
                </label>
                <input 
                    type="text" 
                    id="course-title" 
                    name="title" 
                    class="text-input" 
                    placeholder="Ex: Introduction à la Programmation PHP"
                    required
                >
                <small class="helper-text">Le titre doit être descriptif et accrocheur</small>
            </div>

            <div class="input-group">
                <label for="course-description" class="field-label">
                    Description du cours<span class="required-star">*</span>
                </label>
                <textarea 
                    id="course-description" 
                    name="description" 
                    class="textarea-input" 
                    placeholder="Décrivez les objectifs, le contenu et les compétences acquises dans ce cours..."
                    required
                ></textarea>
                <small class="helper-text">Minimum 50 caractères recommandés</small>
            </div>

            <div class="input-group">
                <label for="course-level" class="field-label">
                    Niveau de difficulté<span class="required-star">*</span>
                </label>
                <select id="course-level" name="level" class="select-input" required>
                    <option value="">-- Sélectionnez un niveau --</option>
                    <option value="Débutant">🟢 Débutant</option>
                    <option value="Intermédiaire">🟡 Intermédiaire</option>
                    <option value="Avancé">🔴 Avancé</option>
                </select>
                <small class="helper-text">Choisissez le niveau adapté au public cible</small>
            </div>

            <hr class="section-divider">

            <!-- Sections du Cours -->
            <h3 class="section-heading">📝 Sections du Cours</h3>

            <div class="sections-container" id="sections-wrapper">
                <div class="section-item">
                    <div class="section-item-header">
                        <span class="section-number">Section 1</span>
                        <button type="button" class="remove-section-btn" onclick="removeSection(this)">✕ Supprimer</button>
                    </div>

                    <div class="input-group">
                        <label class="field-label">
                            Titre de la section<span class="required-star">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="section_titles[]" 
                            class="text-input" 
                            placeholder="Ex: Chapitre 1 - Introduction"
                            required
                        >
                    </div>

                    <div class="input-group">
                        <label class="field-label">
                            Contenu de la section<span class="required-star">*</span>
                        </label>
                        <textarea 
                            name="section_contents[]" 
                            class="textarea-input" 
                            placeholder="Décrivez le contenu de cette section..."
                            required
                        ></textarea>
                    </div>

                    <div class="input-group">
                        <label class="field-label">
                            Position<span class="required-star">*</span>
                        </label>
                        <input 
                            type="number" 
                            name="section_positions[]" 
                            class="number-input" 
                            value="1"
                            min="1"
                            required
                        >
                        <small class="helper-text">Ordre d'affichage de la section (1, 2, 3...)</small>
                    </div>
                </div>
            </div>

            <div class="image-upload-container">
    <label class="label-title">Image du cours :</label>

    <input type="file" name = "image" id="courseImage" accept="image/*" />

    <div class="preview-box">
        <img id="previewImage" src="" alt="Aucune image" />
    </div>
</div>




            <button type="button" class="add-section-btn" onclick="addSection()">+ Ajouter une section</button>

            <div class="button-group">
                <button type="submit" class="submit-button" name = "creer">
                    ✓ Créer le cours
                </button>
                <button type="reset" class="reset-button">
                    ✕ Réinitialiser
                </button>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>

</body>
</html>