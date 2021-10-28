<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class AdminController extends Controller
{
	public function __construct($route)
	{
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function loginAction()// Вход в панель админа
	{	
		if (isset($_SESSION['admin'])){
			$this->view->redirect('../admin/products');
		}
		if (!empty($_POST)){
			if ($this->model->loginValidate($_POST)){
				$_SESSION['admin'] = true;
				unset($_SESSION['auth']);
				$this->view->location('/admin/products');
			}
		}

		$this->view->render('Login');
	}

	public function adminMainAction() // Ввывод всех постов сокращеном варианте
	{	
		$result = $this->model->getProducts();
		$vars = [
			'product' => $result,
		];
		$this->view->render('Prodcuts', $vars);
	}

	public function oneProductAction() // Полный обзор одного выбраного поста
	{	
		$result = $this->model->getProduct($_POST['id']);
		$vars = [
			'product' => $result,
		];
		$this->view->render('Prodcut', $vars);
	}

	public function addProductAction()// Добавление новых постов
	{	
		if ($_POST != []) {
			$this->model->addAdmin($_POST);
			$this->view->message('success', 'Your product added');
		}	

		$result = $this->model->getAllCategory();
		$vars = [
			'cats' => $result,
		];

		$this->view->render('Add', $vars);
	}

	public function editProductAction()// Изменение продукта
	{
		$result = $this->model->getProduct($_POST['id']);
		$vars = [
			'product' => $result,
		];
		if (count($_POST) >= 2) {
			$this->model->editAdmin($_POST);
			$this->view->redirect('/admin/products');
		}
		$this->view->render('Edit', $vars);
	}

	public function deleteProductAction()// Удаление продутка
	{
		if (!empty($_POST)) {
			$this->model->delete($_POST, 'product');
			$this->view->redirect('/admin/products');
		}
	}

	public function searchAdminAction()
	{
		$result = $this->model->searchSimilar($_POST['search']);
		$vars = [
			'product' => $result,
		];
		$this->view->render('Admin', $vars);
	}

	public function addCategoryAction()
	{
		if ($_POST != []) {
			$this->model->addCat($_POST);
			$this->view->message('success', 'New category added');
		}	

		$this->view->render('Category Add');
	}

	public function categoryAdminAction()
	{
		$result = $this->model->getAllCategory();
		$vars = [
			'cats' => $result,
		];

		$this->view->render('Category', $vars);
	}

	public function catAdminAction()
	{
		$result = $this->model->getProductsCategory($_POST['cat']);
		$vars = [
			'product' => $result,
		];
		$this->view->render('Category', $vars);
	}

	public function editCatAction()
	{
		$result = $this->model->getOneCategory($_POST['id']);
		$vars = [
			'cats' => $result,
		];

		if (count($_POST) >= 2) {
			$this->model->editCatAdmin($_POST);
			$this->view->redirect('/admin/category');
		}
		$this->view->render('Category', $vars);
	}

	public function deleteCatAction()
	{
		if (!empty($_POST)) {
			$this->model->delete($_POST, 'category');
			$this->view->redirect('/admin/category');
		}
	}

	public function logoutAction()
	{	
		unset($_SESSION['admin']);
		$this->view->redirect('/');
	}


}