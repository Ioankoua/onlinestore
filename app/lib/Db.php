<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace app\lib;

use PDO;

class Db
{
    protected $db;

    private $host, $dbname, $username, $password;

    public function __construct(){

       $config = require 'app/config/db.php';

       $this->host = $config['host'];
       $this->dbname = $config['db_name'];
       $this->username = $config['user'];
       $this->password = $config['password'];

       $this->db = new PDO("mysql:host=$this->host; dbname=$this->dbname; charset=utf8", $this->username, $this->password);
    }

    public function query($sql, $params = [])
    {
      $stmt = $this->db->prepare($sql);
      if (!empty($params)) {
        foreach ($params as $key => $val) {
          $stmt->bindValue(':'.$key, $val);
        }
      }
      $stmt->execute();
      return $stmt;
    }

    public function findall($sql, $params = [])
    {
      $result = $this->query($sql, $params);
      return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($sql, $params = [])
    {
      $result = $this->query($sql, $params);
      return $result->fetchColumn();
    }

    public function lastInsertId() 
    {
      return $this->db->lastInsertId();
    }

    public function getMaxIdPlus($table)
    {
      $result = Db::find("SELECT MAX(`id`) FROM $table");

      return $result += 1;
    }

    public function getMaxId($table)
    {
      return Db::find("SELECT MAX(`id`) FROM $table");
    }

    public function getId($table, $id)
    {
      return Db::find("SELECT * FROM $table WHERE id = '$id'");
    }

    public function getNameId($table, $name)
    {
      return Db::find("SELECT * FROM $table WHERE name = '$name'");
    }

    public function deleteColum($table, $var)
    {
      Db::query("DELETE FROM `$table` WHERE `$table`.`id` = $var");
    }

    public function message($status, $message)
    {
      exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function update($table, $colum, $values, $id)
    {
      Db::query("UPDATE $table SET $colum = '$values' WHERE id = '$id' ");
    }

    public function emptyFields($name, $email, $login, $pass)
    {
      if (!empty($name) && !empty($email) && !empty($login) && !empty($pass)){
        return true;
      }else{
        $this->db->message('error', 'Empty fields');
      }
    } 

    public function validTitle($title)
    {
      if (strlen($title) > 20  && strlen($title) <= 5) {
        Db::message('error', 'Product name must be no more than 20 characters');
      }
    }

    public function validSmallDes($smallD)
    {
      if (strlen($smallD) < 5  && strlen($smallD) >= 30) {
        Db::message('error', 'Product description must be no more than 30 characters');
      }
    }

    public function validFullDes($fullD)
    {
      if (strlen($fullD) < 10  && strlen($fullD) >= 1) {
        Db::message('error', 'Product description must be more than 40 characters');
      }
    }

    public function validPrice($price)
    {
      if (strlen($price) < 1 && strlen($price) >= 10) {
        Db::message('error', 'Product price must be no more than 10 characters');
      }
    }

    public function validate_name($username)
    {
      if (strlen($username) >= 3 && strlen($username) <= 15){
      }else{
        Db::message('error', 'The name must be at least 3 characters and no more than 15');
      }
      if (1 >= Db::find("SELECT * FROM users WHERE username = '$username'")){
      }else{
        Db::message('error', 'This name is already taken, choose another login');
      }
    }

    public function validate_mail($email)
    {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      }else{
        Db::message('error', 'Invalid email');
      }
    }

    public function validate_login($login)
    {
      if (Db::find("SELECT * FROM users WHERE login = '$login'") == 0) {
        if (strlen($login) == 10 || strlen($login) == 12) {
          return true;
        }else{
          Db::message('error', 'This number is not correct');
        }
      }else{
        Db::message('error', 'This number is already taken');
      }
    }

    public function validate_password($password)
    {
      if (strlen($password) > 4 && strlen($password) < 15) {
      }else{
        Db::message('error', 'The password must be at least 4 characters and no more than 15');
      }
    }


    public function editTitle($title, $id)
    {
      if (!empty($title)) {
        Db::validTitle(iconv_strlen($title));
        Db::update('product', 'title', $title, $id);
      }else{
        Db::message('error', 'The name field is empty');
      }
    }

    public function editSmallDescr($smallD, $id)
    {
      if (!empty($smallD)) {
        Db::validTitle(iconv_strlen($smallD));
        Db::update('product', 'smallDeckr', $smallD, $id);
      }else{
        Db::message('error', 'The name field is empty');
      }
    }

    public function editFullDescr($fullD, $id)
    {
      if (!empty($fullD)) {
        Db::validTitle(iconv_strlen($fullD));
        Db::update('product', 'fullDeckr', $fullD, $id);
      }else{
        Db::message('error', 'The name field is empty');
      }
    }

    public function editPrice($price, $id)
    {
      if (!empty($price)) {
        Db::validTitle(iconv_strlen($price));
        Db::update('product', 'price', $price, $id);
      }else{
        Db::message('error', 'The name field is empty');
      }
    }

    public function addimg($id)
    {
      if ($_FILES['img']['name'] == '') {
        Db::message('error', 'You need added picture');
      }
      $img = $_FILES['img']['name'];
      list($imgname, $type) = explode(".", $img);
      move_uploaded_file($_FILES['img']['tmp_name'], 'public/img/'.$id.".".$type);
      return "$id"."."."$type";
    }

    public function addProductToDb($post, $userid)// проводим валидацию и отправляем данные в бд
    {
      Db::validTitle($post['title']);
      Db::validSmallDes($post['smallDeckr']);
      Db::validFullDes($post['fullDeckr']);
      Db::validPrice($post['price']);

      $lastid = Db::getMaxIdPlus('product');

      $img = Db::addimg($lastid);

      $params = [
        'id' => $lastid,
        'title' => $post['title'],
        'smallDeckr' => $post['smallDeckr'],
        'fullDeckr' => $post['fullDeckr'],
        'price' => $post['price'],
        'cat' => $post['category'],
        'userid' =>  $userid,
        'avatar' => $img,
      ];

      if ($post != []) {

        Db::query('INSERT INTO product VALUES (:id, :title, :smallDeckr, :fullDeckr, :price, :cat, :userid, :avatar)', $params);
        return Db::lastInsertId();
      }
    }

    public function editDbProduct($post)
    {
      $id = $post['id']; 
      $title = $post['title'];
      $smalldescr = $post['smallDeckr'];
      $fullldescr = $post['fullDeckr'];
      $price = $post['price'];

      Db::editTitle($title, $id);
      Db::editSmallDescr($smalldescr, $id);
      Db::editFullDescr($fullldescr, $id);
      Db::editPrice($price, $id);
    }


}