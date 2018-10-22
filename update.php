<?include_once($_SERVER["DOCUMENT_ROOT"]."/classes/Users.php");

if (isset($_REQUEST["update"])) {

	$user["id"] =          htmlspecialchars($_REQUEST["id"]);
	$user["login"] =       htmlspecialchars($_REQUEST["login"]);
	$user["password"] =    htmlspecialchars($_REQUEST["password"]);
	$user["second_name"] = htmlspecialchars($_REQUEST["second_name"]);
	$user["name"] =        htmlspecialchars($_REQUEST["name"]);
	$user["last_name"] =   htmlspecialchars($_REQUEST["last_name"]);

	$users = new Users;
	$users_list = $users -> updateUser($user);

	if ($users_list != 0) {
		header('Location: /');
	}
}
?>