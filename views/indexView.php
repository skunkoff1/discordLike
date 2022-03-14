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
        <form action="../controllers/loginController.php" method="post">
            <label for="name">Votre nom ou pseudo</label>
            <input type="text" name="name">
            <label for="email">Votre email</label>
            <input type="email" name="email">
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password">
            <label for="password2">Confirmez le mot de passe</label>
            <input type="password2" name="password2">
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

        <?php if (isset($_GET['messageSuccess'])) { ?>
        <div class="alert success">
            <p>Vous êtes maintenant inscrit. <a href="../index.php">Connectez vous</a>.</p>
        </div>
        <?php } ?>

    </div>


    <script src="./ressources/js/script.js"></script>
</body>

</html>