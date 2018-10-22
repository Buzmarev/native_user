<?session_start();?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/prolog.php');?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>users</title>
	<link rel="stylesheet" type="text/css" href="/main.css">
</head>
	<body>
		<?if (!empty($_SESSION["auth"])) {?>
			<p>Пользователь: <?=$_SESSION["auth"]["second_name"]?> <?=$_SESSION["auth"]["name"]?> <?=$_SESSION["auth"]["last_name"]?></p>
			<form action="/auth.php" method="post">
				<input type="submit" name="logout" value="Выйти">
			</form>
			<br>
			<form action="/add_user.php" method="post">
				<p>Новый пользователь</p>
				<table>
					<tr>
						<td>Логин</td>
						<td>
							<input type="text" name="login">
						</td>
					</tr>
					<tr>
						<td>Пароль</td>
						<td>
							<input type="text" name="password">
						</td>
					</tr>
					<tr>
						<td>Фамилия</td>
						<td>
							<input type="text" name="second_name">
						</td>
					</tr>
					<tr>
						<td>Имя</td>
						<td>
							<input type="text" name="name">
						</td>
					</tr>
					<tr>
						<td>Отчество</td>
						<td>
							<input type="text" name="last_name">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="add_user" value="Добавить">
						</td>
					</tr>
				</table>
			</form>
		<?} else {?>
			<form action="/auth.php" method="post">
				<p>Авторизация</p>
				<table>
					<tr>
						<td>Логин</td>
						<td>
							<input type="text" name="login">
						</td>
					</tr>
					<tr>
						<td>Пароль</td>
						<td>
							<input type="text" name="password">
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="auth" value="Авторизоваться">
						</td>
					</tr>
				</table>
			</form>
		<?}?>

		<br>
		<form action="/edit-del.php" method="post">
			<p>Список пользователей</p>
			<table class="table">
				<tr>
					<td>id</td>
					<td>Логин</td>
					<td>Фамилия</td>
					<td>Имя</td>
					<td>Отчество</td>
					<?if (!empty($_SESSION["auth"])) {?>
						<td>Изменить</td>
						<td>Удалить</td>
					<?}?>
				</tr>
				<?foreach ($users_list as $user): ?>
					<tr>
						<td><?=$user["id"]?></td>
						<td><?=$user["login"]?></td>
						<td><?=$user["second_name"]?></td>
						<td><?=$user["name"]?></td>
						<td><?=$user["last_name"]?></td>
						<?if (!empty($_SESSION["auth"])) {?>
							<td><a href="/edit.php?id=<?=$user["id"]?>&login=<?=$user["login"]?>&second_name=<?=$user["second_name"]?>&name=<?=$user["name"]?>&last_name=<?=$user["last_name"]?>">Изменить</a></td>
							<td><a href="/del.php?id=<?=$user["id"]?>">Удалить</a></td>
						<?}?>
					</tr>
				<?endforeach;?>
			</table>
		</form>
		<?=$pagination?>
	</body>
</html>