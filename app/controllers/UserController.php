<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class UserController extends Controller
{
	public function addProductAction()
	{
		$cats = $this->model->getAllCategory();

		$vars = [
			'cats' => $cats,
		];

		if ($_POST != []) {
			$id = $this->model->addUser($_POST);
			$this->view->message('success', 'Your product added');
		}	

		$this->view->render('Add', $vars);
	}

	public function myProductAction()
	{
		$id = $_SESSION['userid'];
		$result = $this->model->getMyProducts($id);
		$cats = $this->model->getMyCategory($id);
		$vars = [
			'product' => $result,
			'cats' => $cats,
		];
		$this->view->render('Products', $vars);
	}

	public function myProductCatAction()
	{
		$result = $this->model->getMyProductsCategory($_POST['cat'], $_POST['id']);
		$cats = $this->model->getMyCategory($_SESSION['userid']);
		$vars = [
			'product' => $result,
			'cats' => $cats,
		];
		$this->view->render('Category', $vars);
	}

	public function editProductAction()
	{
		$result = $this->model->getProduct($_POST['id']);
		$vars = [
			'product' => $result,
		];
		if (count($_POST) >= 2) {
			$this->model->editProduct($_POST);
			$this->view->redirect('/account/myproduct');
		}
		$this->view->render('Edit', $vars);
	}

	public function deleteProductAction()
	{
		if (!empty($_POST)) {
			$this->model->deleteProd($_POST);
			$this->view->redirect('/account/myproduct');
		}
	}

	public function personalSettingsAction()
	{
		$result = $this->model->getUserData($_SESSION['userid']);
		$vars = [
			'data' => $result,
		];

		if (count($_POST) == 4) {
			$this->model->getUpdateData($_POST, $result);
			$this->view->message('success', 'Data changed');
		}

		$this->view->render('Category', $vars);
	}

	public function exitAccAction()
	{
		unset($_SESSION['auth']);
		$this->view->redirect('/');
	}

}