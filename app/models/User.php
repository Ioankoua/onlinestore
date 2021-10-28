<?php

namespace app\models;

use app\core\Model;

class User extends Model
{

	public function getMyProducts($id)
    {
      return $this->db->findall("SELECT * FROM product WHERE userid = '$id' ORDER BY id DESC;");
    }

    public function getProduct($id)
    {
      return $this->db->findall("SELECT * FROM product WHERE id = '$id'");
    }

    public function getUserData($id)
    {
      return $this->db->findall("SELECT * FROM users WHERE id = '$id'");
    }

	public function emptyFields($title, $smallD, $fullD, $price, $category)
	{
		if (!empty($title) && !empty($smallD) && !empty($fullD) && !empty($price) && !empty($category)){

		}else{
			$this->db->message('error', 'Empty fields');
		}
	} 

	public function getAllCategory()
    {
        return $this->db->findall('SELECT * FROM category ORDER BY id DESC;');
    }

    public function getMyCategory($id)
    {
    	return $this->db->findall("SELECT DISTINCT cat FROM product WHERE userid = '$id' ORDER BY id DESC;");
    }

    public function getMyProductsCategory($cat, $id)
    {
        return $this->db->findall("SELECT * FROM product WHERE cat = '$cat' AND userid = '$id' ORDER BY id DESC;");
    }

	public function addUser($post)// проводим валидацию и отправляем данные в бд
	{
		$this->db->addProductToDb($post, $_SESSION['userid']);
	}

    public function deleteProd($post)
	{
		$id = $post['id'];

		if (!empty($id)) {
			$result = $this->db->getId('product', $id);
			if ($result == true) {
				$this->db->deleteColum('product', $id);
			}else{
				$this->db->message('error', 'No such id exists');
			}			
		}
	}

	public function editProduct($post)
	{
		$this->db->editDbProduct($post);	
	}

	public function getUpdateData($post, $userdata)
    {
    	$count = 0;

		$id = $userdata['0']['id'];
		$name = $post['username'];
		$email = $post['email'];
		$login = $post['login'];
		$password = $post['password'];

		if ($name != $userdata['0']['username']) {
			$this->db->validate_name($post['username']);
			$this->db->update('users', 'username', $name, $id);
			$count++;
		}

		if ($email != $userdata['0']['email']) {
			$this->db->validate_mail($post['email']);
			$this->db->update('users', 'email', $email, $id);
			$count++;
		}

		if ($login != $userdata['0']['login']) {
			$this->db->validate_login($post['login']);
			$this->db->update('users', 'login', $login, $id);
			$count++;
		}

		if ($password != $userdata['0']['password']) {
			$this->db->validate_password($post['password']);
			$this->db->update('users', 'password', $password, $id);
			$count++;
		}

		if ($count == 0) {
			$this->db->message('error', 'Nothing has changed');
		}

    }



}