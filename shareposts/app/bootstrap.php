<?php

//Load config
require_once ("config/config.php");


//Load Libraries
require_once ("libraries/Core.php");
require_once ("libraries/Controller.php");
require_once ("libraries/Database.php");

//Load Functions

require_once("functions/functions.php");

//load helpers
require_once ("helpers/url_helper.php");
require_once ("helpers/session_helper.php");
//Auroload Core Libraries

spl_autoload_register(function($ClassName){
    require_once ('libraries/'.$ClassName.'php');
})

?>
