<?php

define("LIMIT", 2);


if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}

include_once($_SERVER["DOCUMENT_ROOT"]."/classes/Users.php");
$users = new Users;
$users_list = $users -> getList(LIMIT, $page);
$pagination = $users -> getPagination(LIMIT);
?>