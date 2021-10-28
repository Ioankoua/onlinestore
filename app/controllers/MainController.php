<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class MainController extends Controller
{
	public function mainPageAction()
	{	
		$product = $this->model->getProducts();
		$cats = $this->model->getAllCategory();
		$vars = [
			'product' => $product,
			'cats' => $cats,
		];

		$this->view->render('OStore', $vars);
	}

	public function productAction()
	{
		$result = $this->model->getProduct($_GET['id']);
		$cats = $this->model->getAllCategory();
		$vars = [
			'product' => $result,
			'cats' => $cats,
		];
		$this->view->render('OStore', $vars);
	}

	public function searchAction()
	{
		$result = $this->model->searchSimilar($_POST['search']);
		$cats = $this->model->getAllCategory();
		$vars = [
			'product' => $result,
			'cats' => $cats,
		];
		$this->view->render('OStore', $vars);
	}

	public function categoryAction()
	{
		$result = $this->model->getAllCategory();
		$vars = [
			'cats' => $result,
		];

		$this->view->render('Category', $vars);
	}

	public function productCatAction()
	{
		$result = $this->model->getProductsCategory($_POST['cat']);
		$cats = $this->model->getAllCategory();
		$vars = [
			'product' => $result,
			'cats' => $cats,
		];
		$this->view->render('Category', $vars);
	}




}