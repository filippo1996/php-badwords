<?php 
require_once 'Controllers/CensorshipController.php';

//Instanziamo la classe oggetto con il namespace
$censor = new Controllers\CensorshipController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censura le cattive parole</title>
</head>
<body>
    <h1>Hackeraggio alla Nasa (fake), (sono stati raccolti <?= $censor->index()['strByte'].' bytes' ?>)</h1>
    <h3 id="message"></h3>
    <p id="contentStr"><?= $censor->index()['handle']; ?></p>
    <h4>Il testo è lungo <?= $censor->index()['lengthStr'] ?> caratteri</h4>
    <form>
        <label for="searchWord">Inserisci la parola da censurare</label>
        <input id="searchWord" type="text" name="string" placeholder="Parola da censurare">
        <input id="submit" type="submit" value="invia">
    </form>
    <!-- App.js -->
    <script src="js/app.js"></script>
</body>
</html>