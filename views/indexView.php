<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./ressources/css/style.css">
</head>

<body>
    <?php include('./components/header.php'); ?>
    <div class="form-container">
        <h2>Formulaire d'enregistrement</h2>
        <form action="../controllers/registerController.php" method="post">
            <label for="name">Votre nom ou pseudo</label>
            <input type="text" name="name">
            <label for="email">Votre email</label>
            <input type="email" name="email">
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password">
            <label for="password2">Confirmez le mot de passe</label>
            <input type="password" name="password2">
            <button type="submit">Soumettre</button>
        </form>

        <?php if (isset($_GET['error']) && isset($_GET['messageName'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre nom</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageInvalidEmail'])) { ?>
        <div class="alert error">
            <p>Email non valide</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageEmail'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre email</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messagePassword'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre mot de passe</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messagePassword2'])) { ?>
        <div class="alert error">
            <p>Veuillez confirmer votre mot de passe</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['usedEmail'])) { ?>
        <div class="alert error">
            <p>L'email est déjà utilisé</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['usedName'])) { ?>
        <div class="alert error">
            <p>Le nom ou pseudo est déjà utilisé</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageInvalidPassword'])) { ?>
        <div class="alert error">
            <p>Le mot de passe doit contenir 8 caractères, au moins 1 majuscule et au moins 1 chiffre</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageNotEqualsPassword'])) { ?>
        <div class="alert error">
            <p>Les mots de passe sont différents</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['messageSuccess'])) { ?>
        <div class="alert success">
            <p>Vous êtes maintenant inscrit. <a href="./login.php">Connectez vous</a>.</p>
        </div>
        <?php } ?>

    </div>


    <script src="./ressources/js/script.js"></script>
</body>

</html>