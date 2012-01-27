    <? 
   include_once('./classes/class.index.php');
    include('./conf/conf.tpl');
    ?>
    
    
    <h1>Добро пожаловать на <? echo $project;?>!</h1>
	<p>flatFileHost is a free file hosting service. Feel free to upload your files here!</p>
	<h1>Загрузка файла</h1>
	<br />
	<center>
    <script  type="text/javascript">
    function CheckForm()
    {
        document.form.sub.disabled=true;
        pw1 = document.form.pprotect.value;
        pw2 = document.form.pprotect2.value;
        if (pw1 != pw2)
        {
            document.form.sub.disabled = true;
        }
        else document.form.sub.disabled = false;
    }
    </script>
	<form name="form" enctype="multipart/form-data" action="upload.php" id="form" method="post" onsubmit="a=document.getElementById('form').style;a.display='none';b=document.getElementById('part2').style;b.display='inline';" style="display: inline;">
	<strong>maximum filesize:</strong> <?php echo $maxfilesize; ?> MB<br />
	<?php //if echo $filetypes; ?>
	<input type="file" name="upfile" size="50" /><br />
	Ваш Email (хз зачем, ибо вряд ли мы вам на мыло будем отправлять ссылки на скачку - у вас это будет в UCP): 
    <input type="text" name="myemail" size="30" onkeypress="CheckForm()" onkeyup="CheckForm()" onblur="CheckForm()"/><br />
	Описание:
    <textarea name="descr" cols="50" rows="5" onkeypress="CheckForm()" onkeyup="CheckForm()" onblur="CheckForm()"></textarea><br />
    Пароль защиты файла: 
    <input type="password" name="pprotect" size="30" onkeypress="CheckForm()" onkeyup="CheckForm()" onblur="CheckForm()"/><br />
    Повторите пароль: 
    <input type="password" name="pprotect2" size="30" onkeypress="CheckForm()" onkeyup="CheckForm()" onblur="CheckForm()"/><br />
	<?php if(isset($categorylist)) { echo $categorylist; } ?>
	Загружая файл, вы соглашаетесь с <a href="?page=tos">правилами сервиса</a>. <input name="sub" type="submit" value="Загрузка!" id="upload" />
	</form>
	<div id="part2" style="display: none;">Идет загрузка... подождите</div>
	<br /><br />На данный момент загружено файлов:<b><?php $index= new index; echo $index->getFilesHosted(); ?></b> Объем:<b><?php echo $index->getSizeHosted(); ?></b> MB
	</center>