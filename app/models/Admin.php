<?php

namespace app\models;

use app\core\Model;

class Admin extends Model
{
	public function loginValidate($post) //Проверка логина и пароля при входе в админ панель
	{
		$config = require 'app/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']){
			$this->db->message('error', 'Incorrect login or password');
		}else{
			return true;
		}
	}

	public function getProducts()
    {
      return $this->db->findall('SELECT * FROM product ORDER BY id DESC;');
    }

    public function getProduct($id)
    {
      return $this->db->findall("SELECT * FROM product WHERE id = '$id'");
    }

    public function getAllCategory()
    {
    	return $this->db->findall('SELECT * FROM category ORDER BY id DESC;');
    }

    public function getOneCategory($id)
    {
    	return $this->db->findall("SELECT * FROM category WHERE id = '$id'");
    }

    public function getProductsCategory($cat)
    {
    	return $this->db->findall("SELECT * FROM product WHERE cat = '$cat' ORDER BY id DESC;");
    }

    public function addAdmin($post)// проводим валидацию и отправляем данные в бд
	{
		$this->db->addProductToDb($post, '0');
	}

	public function addImgcat($id)
	{
		if ($_FILES['catimg']['name'] == '') {
			Db::message('error', 'You need added picture');
		}
		$img = $_FILES['catimg']['name'];
		list($imgname, $type) = explode(".", $img);
		move_uploaded_file($_FILES['catimg']['tmp_name'], 'public/catimg/'.$id.".".$type);
		return "$id"."."."$type";
	}

	public function addCat($post)
	{
	  $lastid = $this->db->getMaxIdPlus('category');

	  $img = Admin::addImgcat($lastid);

      $params = [
        'id' => $lastid,
        'cat' => $post['cat'],
        'catdesc' => $post['catdesc'],
        'catimg' => $img,
      ];

      if ($post != []) {
        $this->db->query('INSERT INTO category VALUES (:id, :cat, :catdesc, :catimg)', $params);  
      }

	}

	public function editAdmin($post)
	{
		$this->db->editDbProduct($post);	
	}

	public function editCatAdmin($post)
	{
		$id = $post['id']; 
		$cat = $post['cat'];
		$catdesc = $post['catdesc'];

		$this->db->update('category', 'cat', $cat, $id);
		$this->db->update('category', 'catdesc', $catdesc, $id);
	}

	public function delete($post, $table)
	{
		$id = $post['id'];

		if (!empty($id)) {
			$result = $this->db->getId($table, $id);
			if ($result == true) {
				$this->db->deleteColum($table, $id);
			}else{
				$this->db->message('error', 'No such id exists');
			}			
		}
	}

	public function searchSimilar($query)
    {
    	return $this->db->findall("SELECT * FROM product WHERE title LIKE '%$query%'");
    }
}