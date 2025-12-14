<?php
    include "config.php";
    if(isset($_GET['id'])){
        
        $aziz = $_GET['id'];
        if(isset($_POST["modif"])){
            $newcoursetitle = $_POST['title'];
            $newcoursedescription = $_POST['description'];
            $newcourselevel = $_POST['level'];

            $sql_9 = "UPDATE cours SET
                title = '$newcoursetitle',
                description = '$newcoursedescription',
                level = '$newcourselevel'
                where id = $aziz";
            $con->query($sql_9);
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
    <title>Modifier le Cours - LMS</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', monospace;
            background: linear-gradient(to bottom, #2c3e50, #34495e);
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .edit-wrapper {
            max-width: 850px;
            margin: 0 auto;
        }

        .header-bar {
            background: linear-gradient(135deg, #3498db, #2980b9);
            padding: 1.5rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .return-form {
            margin: 0;
        }

        .return-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.7rem 1.5rem;
            border: 2px solid white;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .return-btn:hover {
            background: white;
            color: #3498db;
        }

        .form-container-box {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .title-section {
            text-align: center;
            margin-bottom: 2.5rem;
            padding-bottom: 2rem;
            border-bottom: 3px solid #3498db;
        }

        .form-main-title {
            font-size: 2.3rem;
            color: #2c3e50;
            margin-bottom: 0.7rem;
        }

        .form-subtitle {
            color: #7f8c8d;
            font-size: 1rem;
        }

        .warning-notice {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 1.3rem;
            border-radius: 8px;
            margin-bottom: 2.5rem;
        }

        .warning-notice p {
            color: #856404;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .input-field-group {
            margin-bottom: 2rem;
        }

        .input-label {
            display: block;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 0.8rem;
            font-size: 1.05rem;
        }

        .star-required {
            color: #e74c3c;
            margin-left: 4px;
        }

        .text-input-field {
            width: 100%;
            padding: 1.1rem;
            border: 2px solid #bdc3c7;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #ecf0f1;
        }

        .text-input-field:focus {
            outline: none;
            border-color: #3498db;
            background: white;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .textarea-input-field {
            width: 100%;
            padding: 1.1rem;
            border: 2px solid #bdc3c7;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            resize: vertical;
            min-height: 150px;
            transition: all 0.3s;
            background: #ecf0f1;
        }

        .textarea-input-field:focus {
            outline: none;
            border-color: #3498db;
            background: white;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .select-input-field {
            width: 100%;
            padding: 1.1rem;
            border: 2px solid #bdc3c7;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            background: #ecf0f1;
            cursor: pointer;
            transition: all 0.3s;
        }

        .select-input-field:focus {
            outline: none;
            border-color: #3498db;
            background: white;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .helper-info {
            display: block;
            margin-top: 0.6rem;
            font-size: 0.88rem;
            color: #7f8c8d;
            font-style: italic;
        }

        .actions-row {
            display: flex;
            gap: 1.2rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #ecf0f1;
        }

        .update-btn {
            flex: 2;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 1.3rem;
            border: none;
            border-radius: 10px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .update-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
        }

        .cancel-btn {
            flex: 1;
            background: white;
            color: #95a5a6;
            padding: 1.3rem;
            border: 2px solid #95a5a6;
            border-radius: 10px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
        }

        .cancel-btn:hover {
            background: #95a5a6;
            color: white;
        }

        @media (max-width: 768px) {
            .form-container-box {
                padding: 2rem;
            }

            .header-bar {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .actions-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    
    <?php
        $sql_8 = "SELECT * FROM cours where id = $aziz";
        $resultcours = $con->query($sql_8);
        $edit = mysqli_fetch_assoc($resultcours);
    ?>
    <div class="edit-wrapper">
        <div class="header-bar">
            <h1 class="header-title">✏️ Modifier le Cours</h1>
            <form method="POST" action="courses_list.php" class="return-form">
                <button type="submit" class="return-btn">← Retour à la liste</button>
            </form>
        </div>

        <div class="form-container-box">
            <div class="title-section">
                <h2 class="form-main-title">Mettre à jour le cours</h2>
                <p class="form-subtitle">Modifiez les informations du cours ci-dessous</p>
            </div>

            <div class="warning-notice">
                <p><strong>⚠️ Important :</strong> La modification de ce cours affectera tous les étudiants inscrits. Assurez-vous que les informations sont correctes avant de sauvegarder.</p>
            </div>

            <form method="POST">

                <div class="input-field-group">
                    <label for="title-field" class="input-label">
                        Titre du cours<span class="star-required">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title-field" 
                        name="title" 
                        class="text-input-field" 
                        value="<?= $edit['title'] ?>"
                        required
                    >
                    <small class="helper-info">Modifiez le titre du cours si nécessaire</small>
                </div>

                <div class="input-field-group">
                    <label for="description-field" class="input-label">
                        Description du cours<span class="star-required">*</span>
                    </label>
                    <textarea 
                        id="description-field" 
                        name="description" 
                        class="textarea-input-field" 
                        required
                    ><?= $edit['description'] ?></textarea>
                    <small class="helper-info">Actualisez la description pour refléter le contenu actuel</small>
                </div>

                <div class="input-field-group">
                    <label for="level-field" class="input-label">
                        Niveau de difficulté<span class="star-required">*</span>
                    </label>
                    <select id="level-field" name="level" class="select-input-field" required>
                        <option value="Débutant" <?= $edit['level'] == 'Débutant' ? 'selected': '' ?> >🟢 Débutant</option>
                        <option value="Intermédiaire" <?= $edit['level'] == 'Intermédiaire' ? 'selected': '' ?> >🟡 Intermédiaire</option>
                        <option value="Avancé" <?= $edit['level'] == 'Avancé' ? 'selected': '' ?> >🔴 Avancé</option>
                    </select>
                    
                    

                    <small class="helper-info">Ajustez le niveau selon la complexité du contenu</small>
                </div>

                <div class="actions-row">
                    <button type="submit" class="update-btn" name="modif">
                        💾 Enregistrer les modifications
                    </button>
                    <button type="button" class="cancel-btn" onclick="history.back()">
                        ✕ Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>