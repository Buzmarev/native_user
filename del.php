<?include_once($_SERVER["DOCUMENT_ROOT"]."/classes/Users.php");

if (isset($_REQUEST["id"])) {

	$id = htmlspecialchars($_REQUEST["id"]);

	$users = new Users;
	$users_list = $users -> deleteUser($id);
	if ($users_list != 0) {
		header('Location: /');
	}
}
?>