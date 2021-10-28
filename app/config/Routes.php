<?php

return [
//AuthController

	'register' => [
		'controller' => 'auth',
		'action' => 'register',
	],

	'enter' => [
		'controller' => 'auth',
		'action' => 'enter',
	],

//MainController

	'' => [
		'controller' => 'main',
		'action' => 'mainPage',
	],

	'search' => [
		'controller' => 'main',
		'action' => 'search',
	],

	'category' =>  [
		'controller' => 'main',
		'action' => 'category',
	],

	'cat/product' =>  [
		'controller' => 'main',
		'action' => 'productCat',
	],

//UserController

	'account/add' => [
		'controller' => 'user',
		'action' => 'addProduct',
	],

	'account/settings' => [
		'controller' => 'user',
		'action' => 'personalSettings',
	],

	'account/exit' => [
		'controller' => 'user',
		'action' => 'exitAcc',
	],

	'account/myproduct' => [
		'controller' => 'user',
		'action' => 'myProduct',
	],

	'account/product/edit' => [
		'controller' => 'user',
		'action' => 'editProduct',
	],

	'account/product/delete' => [
		'controller' => 'user',
		'action' => 'deleteProduct',
	],

	'account/product/cat' => [
		'controller' => 'user',
		'action' => 'myProductCat',
	],

//AdminController

	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],	

	'admin/products' => [
		'controller' => 'admin',
		'action' => 'adminMain',
	],

	'admin/product' => [
		'controller' => 'admin',
		'action' => 'oneProduct',
	],

	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],

	'admin/add' => [
		'controller' => 'admin',
		'action' => 'addProduct',
	],

	'admin/edit' => [
		'controller' => 'admin',
		'action' => 'editProduct',
	],

	'admin/delete' => [
		'controller' => 'admin',
		'action' => 'deleteProduct',
	],

	'admin/search' => [
		'controller' => 'admin',
		'action' => 'searchAdmin',
	],

	'admin/addcategory' => [
		'controller' => 'admin',
		'action' => 'addCategory',
	],

	'admin/category' => [
		'controller' => 'admin',
		'action' => 'categoryAdmin',
	],

	'admin/cat' => [
		'controller' => 'admin',
		'action' => 'catAdmin',
	],

	'admin/cat/edit' => [
		'controller' => 'admin',
		'action' => 'editCat',
	],

	'admin/cat/delete' => [
		'controller' => 'admin',
		'action' => 'deleteCat',
	],

];