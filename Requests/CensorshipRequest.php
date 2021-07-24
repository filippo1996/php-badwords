<?php

require_once '../Controllers/CensorshipController.php';

//Instanziamo la classe oggetto con il namespace
$censor = new Controllers\CensorshipController();

//Return response
$censor->edit($_REQUEST['string']);