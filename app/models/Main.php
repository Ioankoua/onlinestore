<?php

namespace app\models;

use app\core\Model;

class Main extends Model
{
	public function getProducts()
    {
      return $this->db->findall('SELECT * FROM product ORDER BY id DESC;');
    }

    public function getProduct($id)
    {
      return $this->db->findall("SELECT * FROM product WHERE id = '$id'");
    }

    public function searchSimilar($query)
    {
    	return $this->db->findall("SELECT * FROM product WHERE title LIKE '%$query%'");
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
}