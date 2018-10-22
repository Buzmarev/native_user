<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/classes/DB.php");

class Users {
	public function getList($limit, $page)
	{
		$db = DB::getConnection();

		// $query = "SELECT * FROM users";

		// $row = $db->prepare($query);
		// $row->execute();
		// $row_count = $s->rowCount();
		// $pages = ceil($row_count/$limit);

		$start = ($page-1)*$limit;
        
        $users = array();
        $result = $db -> query("SELECT id, login, name, second_name, last_name FROM users ORDER BY id ASC LIMIT $start, $limit");
        
        for($i = 0; $row = $result -> fetch(); $i++){
            $users[$i]['id'] = $row['id'];
            $users[$i]['login'] = $row['login'];
            $users[$i]['name'] = $row['name'];
            $users[$i]['second_name'] = $row['second_name'];
            $users[$i]['last_name'] = $row['last_name'];
        }
        return $users;
	}
	public function getPagination($limit)
	{
		$db = DB::getConnection();

		$query = "SELECT * FROM users";

		$row = $db->prepare($query);
		$row->execute();
		$row_count = $row->rowCount();
		$pages = ceil($row_count / $limit);

		$pagination = "<p>";

		for ($i = 1; $i <= $pages; $i++) {
			$pagination .= "<a href='/?page=$i'>$i</a> ";
		}

		$pagination .= "</p>";

		return $pagination;
	}
	public function addUser($options)
    {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO users '
                . '(login, password, name, second_name, last_name)'
                . 'VALUES '
                . '(:login, :password, :name, :second_name, :last_name)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':second_name', $options['second_name'], PDO::PARAM_STR);
        $result->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        
        if ($result->execute()) return $db->lastInsertId();
        return 0;
    }
    public function auth($login, $password)
    {
    	$db = DB::getConnection();
        
        $sql = 'SELECT * FROM users WHERE login = :login AND password = :password';
        
        $result = $db ->prepare($sql);
        $result ->bindParam(':login', $login, PDO::PARAM_STR);
        $result ->bindParam(':password', $password, PDO::PARAM_STR);
        $result ->execute();
        
        $user = $result ->fetch();
        if($user) return $user;
        return false;
    }
    public function updateUser($options)
    {
        $db = Db::getConnection();
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        if (!empty($options['password'])) {
        	$sql = 'UPDATE users
	            SET 
	                login = :login, 
	                password = :password,
	                second_name = :second_name, 
	                name = :name, 
	                last_name = :last_name 
	            WHERE id = :id';
        } else {
	        $sql = 'UPDATE users
	            SET 
	                login = :login,
	                second_name = :second_name, 
	                name = :name, 
	                last_name = :last_name
	            WHERE id = :id';
        }
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        $result->bindParam(':login', $options['login'], PDO::PARAM_STR);
        if (!empty($options['password'])) {
        	$result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        }
        $result->bindParam(':second_name', $options['second_name'], PDO::PARAM_STR);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);

        return $result->execute();
    }
    public function deleteUser($id)
    {
        $db = DB::getConnection();
        
        $sql = 'DELETE FROM users WHERE id = :id';
        
        $result = $db ->prepare($sql);
        $result ->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
}
?>