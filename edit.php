<form action="/update.php" method="post">
	<input type="hidden" name="id" value="<?=$_REQUEST["id"]?>">
	<p>Изменить пользователя</p>
	<table>
		<tr>
			<td>Логин</td>
			<td>
				<input type="text" name="login" value="<?=$_REQUEST["login"]?>">
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
				<input type="text" name="second_name" value="<?=$_REQUEST["second_name"]?>">
			</td>
		</tr>
		<tr>
			<td>Имя</td>
			<td>
				<input type="text" name="name" value="<?=$_REQUEST["name"]?>">
			</td>
		</tr>
		<tr>
			<td>Отчество</td>
			<td>
				<input type="text" name="last_name" value="<?=$_REQUEST["last_name"]?>">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="update" value="Изменить">
			</td>
		</tr>
	</table>
</form>