<?php
$dir = 'dir';
if(!empty($_POST)){
$new = htmlspecialchars(extract($_POST), ENT_QUOTES);

if ($password == file_get_contents('pass.txt', true)){




//ЗАПИСЫВАЮ В ФАЙЛ АЙДИ И ИМЯ
setcookie('access', $password, time() + 3600, '/');
require_once 'index.php';
echo "<div style = 'height: 76px;'></div>
<h1 style = 'text-align:center;color:green;'>Авторизация успешна!</h1>";exit;
} else {require_once 'index.php';echo "<h1 style = 'text-align:center;color:red;'>Неправильный пароль!</h1>";}




	}

require_once 'index.php';
echo "<div style = 'height: 56px;'></div>"
?>


 <style>
p{

color: white;
text-align: center;
  font-size: 120%;
}

</style>

<div style = "position: relative; width: 100%;text-align: center;top:70px;">

<form action = "entry.php" method="post">

		<p>
			<label for="password"><h2 style = "color:black; padding: 0">Введите пароль:</h2></label>
			<input type="text" name="password" id="password" autocomplete="off">
		</p>
		<button type="submit">Войти!</button>
	</form>

			</div>
