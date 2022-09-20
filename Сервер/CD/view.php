<?php
if (isset($_COOKIE['dir'])){
$dir = $_COOKIE['dir'];} else {$dir = 'data';setcookie('dir', $dir, time() + 3600, '/');}


//-это первоначальная директория


//Проверяю есть ли привилегия
if(@$_COOKIE['access'] != file_get_contents('pass.txt', true)){




//Если нажата папка, то меняю текущую директорию



if(!empty($_POST['followb'])) {

if ($dir != "data"){
$dir = dirname($dir);
setcookie('dir', $dir , time() + 3600, '/');}

}



if(!empty($_POST['follow']))
{
setcookie('dir', $dir . "/".$_POST['follow'] , time() + 3600, '/');
$dir .="/".$_POST['follow']."/";
}







//сканирую текущую директорию
$files1 = scandir($dir);

require_once('index.php');


//создаю таблицу из файлов и папок
echo "<table border = '1' font-size:5em margin = '10px auto'>";

//прохожусь по результатам сканирования директорий
foreach($files1 as $value) {

//Если это не родитель директории то
if(($value !== "..")&&($value !== ".")){






// Проверка на файл, если не файл, то обозначаю картинкой папки
if(!pathinfo($value, PATHINFO_EXTENSION)){
echo "<tr><td style ='width:800px'><form action = 'view.php' method='post'>

			<input type='submit'  style = 'width: 200px;font:9pt Franklin Gothic Book;' name='follow' class ='direct' id='image-button' value = '$value'>

	</form></td></tr>";}



}
}

foreach($files1 as $value){

if(pathinfo($value, PATHINFO_EXTENSION)){
echo "<tr><td style ='width:800px'> <div style = 'width = 200px'><a href='$dir/$value' style = 'color: #775f48 ; ' download><img src='img/file.png' style= 'height: 35 px;' alt=''> $value</a></div></td>";}
}






echo "</table>";
}


else
//ЕСЛИ ПРИВИЛЕГИЯ ЕСТЬ-->

















{





if(!empty($_POST)){



//Если нажата папка, то меняю текущую директорию
if(!empty($_POST['follow'])) {

setcookie('dir', $dir . "/".$_POST['follow'] , time() + 3600, '/');
$dir .="/".$_POST['follow'];
}
//если нажата директория назад
if(!empty($_POST['followb'])) {

if ($dir != "data"){
$dir = dirname($dir);
setcookie('dir', $dir , time() + 3600, '/');}

}
//создаю директорию
if(!empty($_POST['mkdir'])) {


@mkdir($dir."/Созданная папка", 0700);

}
//копирую файлы
if(!empty($_POST['copy'])) {
if(!isset($_COOKIE['num'])){setcookie('num', 0 , time() + 3600, '/');}

$num = $_COOKIE['num'];
setcookie("files[$num]", $dir . "/".$_POST['copy'] , time() + 3600, '/');

setcookie('num', $num+1 , time() + 3600, '/');
}

//вставляю файлы
if (!empty($_POST['ins'])&&!empty($_COOKIE['files'])){

foreach($_COOKIE['files'] as $name => $value){
copy($value, $_COOKIE['dir']."/".basename($value));
setcookie("files[$name]", $dir . "/".$_POST['copy'] , time() - 3600, '/');

}
setcookie('num', $num+1 , time() - 3600, '/');
setcookie('files[]', "" , time() - 3600, '/');
}

//перемещаю
if (!empty($_POST['move'])&&!empty($_COOKIE['files'])){

foreach($_COOKIE['files'] as $name => $value){
rename($value, $_COOKIE['dir']."/".basename($value));
setcookie("files[$name]", $dir . "/".$_POST['copy'] , time() - 3600, '/');

}
setcookie('num', $num+1 , time() - 3600, '/');
setcookie('files[]', "" , time() - 3600, '/');
}
///













require_once 'index.php';


//здесь выполняю удаление папки
if(!empty($_POST['del_dir'])){

@rmdir($dir."/".$_POST['del_dir']);

}


//удаляю файл
if(!empty($_POST['del_file'])) {
@unlink($dir."/".$_POST['del_file']);
}



//здесь вывожу окно для ввода новго имени файла/папки
if(!empty($_POST['rename'])) {

$old = $_POST['rename'];
echo " <form action = 'view.php' method='POST'>

   <p><input type='text' name='newtext' autocomplete='off' maxlength='50' placeholder='введите новое название' size='50'
style = ' width: 100%;
left:0px;
    height: 30px;
    position: fixed;
    top: 30%;
     font:7pt Franklin Gothic Book;
   
   font-size:35px;color:black;'></p>
   <p>

   <button type='submit'  name = 'old' value = '$old'
style = 'background-color: green;
	border: none;
	left:0px;
    color: white;
    position: fixed;
    top: 38%;
    left: 40%;'>Подтвердить</button>
   </p>
  </form>";

}


//После ввода нового имени, начинаю процедуру переимен.
if(!empty($_POST['newtext'])) {

$path_info = pathinfo($dir."/".$_POST['old']);


if(!pathinfo($_POST['old'], PATHINFO_EXTENSION)) {//тут для папки
	if(@rename($dir."/".$_POST['old'], $dir."/".$_POST['newtext'])) {echo "Успешно!";} else {echo "Ошибка!";}
} else

{
$ex = $path_info['extension'];//тут для файла
if(@rename($dir."/".$_POST['old'], $dir."/".$_POST['newtext'].".$ex")) {echo "Успешно!";} else {echo "Ошибка!";}
}
}

//загрузка файла
if(!empty($_POST['dir'])){

$uploaddir = "C:/openserver/domains/CD/$dir/";

$uploadfile = $uploaddir . $_FILES['userfile']['name'];

move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
}










}




require_once('index.php');

//сканирую текущую директорию
$files1 = scandir($dir);

//создаю таблицу из файлов и папок
echo "<table border = '1' font-size:5em margin = 'auto'>";






//прохожусь по результатам сканирования директорий
foreach($files1 as $value) {



//Если это родитель начальной директории то упускаем его нахуй он не нужен
if(($value !== "..")&&($value !== ".")){







// Проверка на файл, если не файл, то обозначаю картинкой папки, здесь ебучие кнопки для папки, удалить, открыть там вся хуйня
if(!pathinfo($value, PATHINFO_EXTENSION)){
echo "<tr><td><form action = 'view.php' method='post'>


			<input type='submit' style = 'width: 300px;font:9pt Franklin Gothic Book;' name='follow' class ='direct' id='image-button' value = '$value' >



	</form></td>

<td><form action = 'view.php' method='post'>

			<input type='submit' style='color: transparent' name='del_dir' class = 'del' id='$value' value = '$value'>


	</form></td>


<td><form action = 'view.php' method='post'>

			<input type='submit' style='color: transparent' name='rename' class ='ren' id='$value' value = '$value'>


	</form> </td>


<td> </td>




	</tr>";}
}
}

foreach ($files1 as $value)
{

if(pathinfo($value, PATHINFO_EXTENSION)){


	echo "<tr><td style = 'width:800px'> <a href='$dir/$value' style = 'color: #775f48 ; width: 800px'  download><img src='img/file.png' style= 'height: 35 px;' alt=''> $value</a></td>


<td><form action = 'view.php' method='post'>

			<input type='submit'style='color: transparent' name='del_file' class = 'del' id='$value' value = '$value'>


	</form></td>


<td><form action = 'view.php' method='post'>

			<input type='submit'style='color: transparent' name='rename' class ='ren' id='$value' value = '$value'>


	</form> </td>


<td><form action = 'view.php' method='post'>

			<input type='submit'style='color: transparent' name='copy' class ='copy' id='$value' value = '$value'>


	</form> </td>


</tr>";}}













echo "</table>";



}

?>
