<?

// ###############
// # Class index #
// ###############


require('conf/conf.tpl'); // Config file

class index{

var $deleteseconds, $fc, $f, $line, $thisline;
    
public function deleteOld($deleteafter){
        
$this->deleteseconds = time() - ($deleteafter * 24 * 60 * 60);

$this->fc=file("./files.txt");
$this->f=fopen("./files.txt","w");
foreach($this->fc as $this->line)
{
  $this->thisline = explode('|', $this->line);
  if ($this->thisline[4] > $this->deleteseconds)
    fputs($this->f,$this->line);
  else
    unlink("./storage/".$this->thisline[0]);
}
fclose($this->f);
}



var $fileshosted, $sizehosted, $handle, $categorylist, $filetypes,$p;  
public function showAll($allowedtypes, $categories){
$this->fileshosted=sizeof(file("./files.txt")); //get the # of files hosted
$this->sizehosted = 0; //get the storage size hosted
$this->handle = opendir("./storage/");
while($file = readdir($this->handle)) {
$this->sizehosted = $this->sizehosted + filesize ("./storage/".$file);
  if((is_dir("./storage/".$file.'/')) && ($file != '..')&&($file != '.'))
  {
  $this->sizehosted = $this->sizehosted + total_size("./storage/".$file.'/');
  }
}
$this->sizehosted = round($this->sizehosted/1024/1024,2);

if(isset($allowedtypes)){ //get allowed filetypes.
  $this->types = implode(", ", $allowedtypes);
  $this->filetypes = "<b>Разрешенные расширения</b> ".$this->types."<br /><br />";
} else { $filetypes = ""; }

if(isset($categories)){ //get categories
  $this->categorylist = "Категории: <select name=\"category\">";
  foreach($categories as $this->category){
    $this->categorylist .= "<option value=\"".$this->category."\">".$this->category."</option>";
  }
  $this->categorylist .= "</select><br />";
} else { $this->filetypes = ""; }

if(isset($_GET['page']))
  $this->p = $_GET['page'];
else
  $this->p = "0";

switch($this->p) {
case "tos": include("./pages/tos.php"); break;
case "faq": include("./pages/faq.php"); break;
default: include("./pages/upload.php"); break;
}
}
public function getFilesHosted(){
    return $this->fileshosted;
}
public function getSizeHosted(){
    echo $this->sizehosted;
}
}


?>