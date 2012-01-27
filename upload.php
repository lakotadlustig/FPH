<?php
// Edited by vlaim


include_once("./header.php");
require_once("conf/conf.tpl");
require_once("$class_path.index.php");



$filename = $_FILES['upfile']['name'];
$filesize = $_FILES['upfile']['size'];
$filecrc = md5_file($_FILES['upfile']['tmp_name']);

$bans=file("./bans.txt");
foreach($bans as $line)
{
  if ($line==$filecrc."\n"){
    echo "Этот файл не может быть загружен";
    include("./footer.php");
    die();
  }
  if ($line==$_SERVER['REMOTE_ADDR']."\n"){
    echo "You are not allowed to upload files.";
    include("./footer.php");
    die();
  }
}

$checkfiles=file("./files.txt");
foreach($checkfiles as $line)
{
  $thisline = explode('|', $line);
  if ($thisline[0]==$filecrc){
    echo "That file has already been uploaded.<br />";
    echo "Your download link is: <a href=\"" . $scripturl . "download.php?file=" . $filecrc . "\">". $scripturl . "download.php?file=" . $filecrc . "</a><br />";
    echo "This file was originally uploaded by someone else, so you don't get a delete link.";
    include("./footer.php");
    die();
  }
}

if(isset($allowedtypes)){
$allowed = 0;
foreach($allowedtypes as $ext) {
  if(substr($filename, (0 - (strlen($ext)+1) )) == ".".$ext)
    $allowed = 1;
}
if($allowed==0) {
   echo "That file type is not allowed to be uploaded.";
   include("./footer.php");
   die();
}
}

if(isset($categorylist)){
$validcat = 0;
foreach($categories as $cat) {
  if($_POST['category']==$cat || $_POST['category'] = ""){ $validcat = 1; }
}
if($validcat==0) {
   echo "Invalid category was chosen..";
   include("./footer.php");
   die();
}
$cat = $_POST['category'];
} else { $cat = ""; }

if($filesize==0) {
echo "You didn't pick a file to upload.";
include("./footer.php");
die();
}

$filesize = $filesize / 1048576;

if($filesize > $maxfilesize) {
echo "The file you uploaded is too large.";
include("./footer.php");
die();
}

$userip = $_SERVER['REMOTE_ADDR'];
$time = time();

if($filesize > $nolimitsize) {

$uploaders = fopen("./uploaders.txt","r+");
flock($uploaders,2);
while (!feof($uploaders)) { 
$user[] = chop(fgets($uploaders,65536));
}
fseek($uploaders,0,SEEK_SET);
ftruncate($uploaders,0);
foreach ($user as $line) {
@list($savedip,$savedtime) = explode("|",$line);
if ($savedip == $userip) {
if ($time < $savedtime + ($uploadtimelimit*60)) {
echo "You're trying to upload again too soon!";
include("./footer.php");
die();
}
}
if ($time < $savedtime + ($uploadtimelimit*60)) {
  fputs($uploaders,"$savedip|$savedtime\n");
}
}
fputs($uploaders,"$userip|$time\n");

}

$passkey = rand(100000, 999999);

if($emailoption && isset($_POST['myemail']) && $_POST['myemail']!="") {
$uploadmsg = "Файл(".$filename.") был успешно загружен.\n Ссылка для скачки: ". $scripturl . "download.php?file=" . $filecrc . "\n Удалить файл: ". $scripturl . "download.php?file=" . $filecrc . "&del=" . $passkey . "\n Спасибо за использование нашего сервиса!";
mail($_POST['myemail'],"Your Uploaded File",$uploadmsg,"From: admin@yoursite.com\n");
}

if($passwordoption && isset($_POST['pprotect'])) {
  $passwerd = md5($_POST['pprotect']);
} else { $passwerd = md5(""); }

if($descriptionoption && isset($_POST['descr'])) {
  $description = strip_tags($_POST['descr']);
} else { $description = ""; }

$filelist = fopen("./files.txt","a+");
fwrite($filelist, $filecrc ."|". basename($_FILES['upfile']['name']) ."|". $passkey ."|". $userip ."|". $time."|0|".$description."|".$passwerd."|".$cat."|\n");

$movefile = "./storage/" . $filecrc;
move_uploaded_file($_FILES['upfile']['tmp_name'], $movefile);

echo "Ваш файл был успешно загружен!<br />";
echo "Ссылка для скачки: <a href=\"" . $scripturl . "download.php?file=" . $filecrc . "\">". $scripturl . "download.php?file=" . $filecrc . "</a><br />";
echo "Удалить файл: <a href=\"" . $scripturl . "download.php?file=" . $filecrc . "&del=" . $passkey . "\">". $scripturl . "download.php?file=" . $filecrc . "&del=" . $passkey . "</a><br />";
echo "Пожалуйста, сохраните эти ссылки";
include("./footer.php");
?>