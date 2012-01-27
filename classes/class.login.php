<?
// ###############
// # Class login #
// ###############
require_once('conf/conf.tpl'); // Config file

class login{   

private $flag=0, $location, $user, $password, $dbname, $sel, $auth_sel, $parser, $welcome, $status, $check=NULL, $priv;

public function __construct($locationp, $userp, $passwordp, $dbnamep){
    $this->location=$locationp;
    $this->user=$userp;
    $this->password=$passwordp;
    $this->dbname=$dbnamep;  
}

public function connect(){
    $this->flag=mysql_connect($this->location, $this->user, $this->password);
    mysql_query ("set character_set_client='utf8'");
    mysql_query ("set character_set_results='utf8'");
    mysql_query ("set collation_connection='utf8_general_ci'"); 
    mysql_select_db($this->dbname);
    }

public function select($sql){
    if ($this->flag==false) 
    $this->connect(); 
    $this->sel=mysql_query("SELECT * FROM body WHERE id='$sql'");
}

public function fetch($field){
    
    $this->parser=mysql_fetch_array($this->sel);
    $this->welcome=$this->parser[$field];
    echo $this->welcome;
}

public function authorise($table_a){
    if ($this->flag == false)
    $this->connect();
    if(isset($_POST['send'])){
    $this->auth_sel=mysql_query("SELECT * FROM $table_a WHERE user='".$_POST['user']."'
        AND password='".$_POST['password']."'");
    $this->priv=mysql_fetch_array($this->auth_sel);
    $this->check=mysql_num_rows($this->auth_sel);
    }
    }
    
public function getAuth(){ 

if((isset($this->check)) and ($this->check==1)){
    session_start();
    $_SESSION['auth']=true;
    $_SESSION['user']=$_POST['user'];
   	$_SESSION['password']=$_POST['password'];
    $_SESSION['priv']=$this->priv['priv'];
    header('location:admin.php');
    
}
else {
    if(isset($_POST['send'])){
echo "<h3>Неправильная пара логин/пароль. Проверьте правильность вводимых данных</h3>  <br/>
        <a href='javascript:history.go(-1)'>Назад</a>";
    }
}
}

public function __destruct() {
mysql_close($this->flag);
}


}


?>