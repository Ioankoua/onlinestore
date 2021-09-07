<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class MainController extends Controller
{
	public function postAction()
	{	
		$result = $this->model->getAllPosts();
		$vars = [
			'posts' => $result,
		];
		$this->view->render('Post', $vars);
	}

	public function fullpostAction()
	{	
		$result = $this->model->getFullPosts($_POST['idpost']);
		$comment = $this->model->getComent($_POST['idpost']);
		$vars = [
			'posts' => $result,
			'comments' => $comment,
		];
		$this->view->render('Fullpost', $vars);
	}

	public function likeAction()
	{
		$this->model->makeLike($_POST);
		
		?> <script type="text/javascript">window.history.back()</script><?
	}

	public function comentAction()
	{
		$this->model->addComent($_POST);

		?> <script type="text/javascript">window.history.back()</script><?
	}

	public function exitAction()
	{	
		unset($_SESSION['auth']);
		$this->view->redirect('/');
	}
}