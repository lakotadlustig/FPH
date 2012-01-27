<?php
// Edited by vlaim

//elements
require_once("conf/conf.tpl");
include_once("./header.php");
require_once("$class_path.index.php");
require_once("$class_path.login.php");
//delete old files
$index= new index;
$index->deleteOld($deleteafter);
if (isset($allowedtypes) and isset($categories))
$index->showAll($allowedtypes, $categories);

//authorisation
$login=new login($loc, $us, $pwd, $dbname);
$login->authorise("users");

include_once("./footer.php");
?>