<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../ressources/css/style.css">
</head>

<body>
    <?php include('../components/header.php'); ?>
    <div class="form-container">
        <h2>Formulaire de connexion</h2>
        <form action="../controllers/loginController.php" method="post">
            <label for="email">Votre email ou pseudo</label>
            <input type="text" name="email">
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password">
            <button type="submit">Soumettre</button>
        </form>

        <?php if (isset($_GET['error']) && isset($_GET['messageEmail'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre email ou pseudo</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messageUser'])) { ?>
        <div class="alert error">
            <p>Email ou pseudo non reconnu</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messagePassword'])) { ?>
        <div class="alert error">
            <p>Veuillez renseigner votre mot de passe</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['error']) && isset($_GET['messagePassword2'])) { ?>
        <div class="alert error">
            <p>Le mot de passe est invalide</p>
        </div>
        <?php } ?>

        <?php if (isset($_GET['messageSuccess'])) { ?>
        <div class="alert success">
            <p>Vous êtes maintenant connecté. <a href="../index.php">Inscrivez vous</a>.</p>
        </div>
        <?php } ?>

    </div>


    <script src="./ressources/js/script.js"></script>
</body>

</html>