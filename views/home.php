<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../ressources/css/style.css">
</head>

<body>
    <?php include('../components/header.php'); ?>

    <form action="../controllers/homeController.php" method="post">
        <label for="serverName">Nom du serveur</label>
        <input type="text" name="serverName">
        <button type="submit">Soumettre</button>
    </form>
    <?php if($message!='') {   
        echo $message;
     } ?>
    <h1>Liste des serveurs</h1>
    <?php 
     $reqServerList = $db->prepare('SELECT server_name FROM server_list');
     $reqServerList->execute();
     while($data = $reqServerList->fetch()) {
         echo '<p>'.$data['server_name'].'</p>';
     }
     ?>

    <script src="./ressources/js/script.js"></script>
</body>

</html>