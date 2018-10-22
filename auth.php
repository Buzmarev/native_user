<?session_start();?>
<?include_once($_SERVER["DOCUMENT_ROOT"]."/classes/Users.php");

if (isset($_REQUEST["auth"])) {

	$login =    htmlspecialchars($_REQUEST["login"]);
	$password = htmlspecialchars($_REQUEST["password"]);

	$users = new Users;
	$auth = $users -> auth($login, $password);


	if (!empty($auth)) {
		$_SESSION["auth"] = $auth;
		header('Location: /');
	}
	echo "Неверный логин или пароль";
	echo "<br>";
	echo "<a href='/'>Home</a>";
} else if (isset($_REQUEST["logout"])) {
	unset($_SESSION["auth"]);
	header('Location: /');
}