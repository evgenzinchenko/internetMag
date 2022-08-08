<?php

require_once(ROOT.'/models/Category.php');
require_once(ROOT.'/components/Cart.php');
require_once(ROOT.'/models/Product.php');

class CartController
{
	
	public function actionAdd($id)
	{
		//добавлен товар в корзину
		Cart::addProduct($id);

		//Возвращаем пользователя на страницу
		$referrer = $_SERVER['HTTP_REFERER'];
		header("Location: $referrer");
	}

	public function actionAddAjax($id)
	{
		echo Cart::addProduct($id);
		return true;
	}

	public function actionDelete($id)
	{
		Cart::deleteProduct($id);

		header("Location: /cart");
	}

	public function actionIndex()
	{
		$categories = array();
		$categories = Category::getCategoriesList();

		$productsInCart = Cart::getProducts();

		if ($productsInCart) {
			$productsIds = array_keys($productsInCart);
			$products = Product::getProductsByIds($productsIds);

			$totalPrice = Cart::getTotalPrice($products);
		}
		require_once(ROOT . '/views/cart/index.php');

		return true;
	}

	public function actionCheckout()
	{
		//Список категорий для левого меню
		$categories = array();
		$categories = Category::getCategoriesList();

		$result = false;

		//Форма отправлена?
		if (isset($_POST['submit'])) {
			//Форма отправлена? - Да

			//Считываем данные формы
			$userName = $_POST['userName'];
			$userPhone = $_POST['userPhone'];
			$userComment = $_POST['userComment'];

			//Валидация полей
			$errors = false;
			if (!User::checkName($userName))
				$errors[] = 'Неправильное имя';
			if (!User::checkPhone($userPhone))
				$errors[] = 'Неправильный телефон';

			//Форма заполнена корректно?
			if ($errors == false) {
				//Форма заполнена корректно? - Да
				//Сохраняем заказ в БД

				//Собираем информацию о заказе
				$productsInCart = Cart::getProducts();
				if (User::isGuest()) {
					$userId = false;
				} else {
					$userId = User::checkLogged();
				}

				//Сохраняем заказ в ДБ
				$result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

				if ($result) {
					//Оповещаем администратора о новом заказе
					$adminEmail = 'evgen159@ukr.net';
					$message = '';
					$subject = 'Новый заказ';
					mail($adminEmail, $subject, $message);

					//Очистить корзину
					Cart::Clear();
				}
			} else {
				//Форма отправлена? - Нет

				//Получаем данные из корзины
				$productsInCart = Cart::getProducts();
				// //В корзине есть товары?
				// if ($productsInCart == false) {
				// 	//В корзине есть товары? - Нет
				// 	//Отправляем пользователя на главную искать товары
				// 	header("Location: /");
				// } else {
					//В корзине есть товары? - Да	

					//Итоги: общая стоимость, количество товара
					$productsIds = array_keys($productsInCart);
					$products = Product::getProductsByIds($productsIds);
					$totalPrice = Cart::getTotalPrice($products);
					$totalQuantity = Cart::countItems();

					// $userName = false;
					// $userPhone = false;
					// $userComment = false;

					// //Пользователь авторизован?
					// if (User::isGuest()) {
					// 	//Нет
					// 	//Значения для формы пустые
					
				// 	} else {
				// 		//Да, авторизован
				// 		//Получаем информацио о пользователе из БД по id
				// 	$userId = User::checkLogged();
				// 	$user = User::getUserById($userId);
				// 	//Подставляем в форму
				// 	$userName = $user['name'];
				

				// }
			}
		}
		require_once(ROOT . '/views/cart/checkout.php');

		return true;
	}
}
