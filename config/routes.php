<?php


return array (


	'product/([0-9]+)' => 'product/view/$1', //actionView v ProductController

	 
	'catalog' => 'catalog/index', //actionIndex v CatalogController 
	
	'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',//actionCategory v CatalogController
	'category/([0-9]+)' => 'catalog/category/$1', //actionCategory v CatalogController

	'cart/checkout' => 'cart/checkout',//actionAdd v CartController
	'cart/delete/([0-9]+)' => 'cart/delete/$1', //actionDelete v CartController
	'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd v CartController

	'cart/addAjax/{[0-9]+}' => 'cart/addAjax/$1', //actionAdd v CartController
	'cart' => 'cart/index', //actionIndex v CartController

	'user/register' => 'user/register',
	'user/login' => 'user/login',
	'user/logout' => 'user/logout',

	'cabinet/edit' => 'cabinet/edit',
	'cabinet' => 'cabinet/index',

	'contacts' => 'site/contact',

	'' => 'site/index', //actionIndex v SiteController

); 

