<?php
include_once './controllers/ActionController.php';

interface RequestHandler {
	public function handle($request): array;
}

// GET https://localhost:5000?name=Test
class GetHandler implements RequestHandler {
	public function handle($request): array {
		return ['message' => 'GET request'];
	}
}

// POST https://localhost:5000/questions 
/**
 *  '{"offset": 0, "type": "JUNIOR | ADULT" }'
 */

 /**
  * 1. Вытащила 10
  * 2. Берешь последний вопрос
  * 3. Если категория есть, то делаешь запрос в базу и вытаскиваешь оставшиеся вопросы по этой категории где номер > последнего
  * 4. С сервера возвращаем { offset: 27 }
 */

class PostHandler implements RequestHandler {
	private $controllers;
	public function __construct() {
		$this->controllers = [
			'/user' => new ActionController()
			// add more mappings here as needed
		];
	}
	public function handle($request): array {
        /**
		 *  '{"name": "INSERT INTO table VALUES ()"}'
		 */

		$json = file_get_contents('php://input');
		$data = json_decode($json, true);
		 /**
		 *  [
		 *    "name" => "Test"
		 *  ]
		 */

		// Здесь можно сделать первичную валидацию для всех запросов

		// http://localhost:5000/user
		// http://localhost:5000/dashboard

		$requestURI = $_SERVER['REQUEST_URI'];
		$data['uri'] = $requestURI;

		$data['message3'] = 'POST request';
		return $data;
	}
}

class PutHandler implements RequestHandler {
	public function handle($request): array {
		$json = file_get_contents('php://input');
		$data = json_decode($json, true);
		$data['message'] = 'PUT request';
		return $data;
	}
}