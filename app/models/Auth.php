<?php

namespace app\models;

use app\core\Model;

class Auth extends Model
{

	public function registrait($post)// проводим валидацию и отправляем данные в бд
	{
		$lastid = $this->db->getMaxIdPlus('users');

		$params = [
			'id' => $lastid,
			'username' => $post['username'],
			'email' => $post['email'],
			'login' => $post['login'],
			'password' => $post['password'],
		];

		if ($post != []) {
			$this->db->emptyFields($post['username'], $post['email'], $post['login'], $post['password']);

			$this->db->validate_name($post['username']);
			$this->db->validate_mail($post['email']);
			$this->db->validate_login($post['login']);
			$this->db->validate_password($post['password']);

			$this->db->query('INSERT INTO users VALUES (:id, :username, :email, :login, :password)', $params); // отправляем в бд

			return $this->db->lastInsertId();
		}
	}

	public function checkAutorision($post)// проверяет зарегестрированы ли логин и пароль
	{

		$l = $post['login'];
		$p = $post['password'];

		return $this->db->find("SELECT * FROM users WHERE login = '$l' AND password = '$p'");
	}

	public function getName($id)
	{
		return $this->db->find("SELECT username FROM users WHERE id = '$id'");
	}

}