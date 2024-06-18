<?php
include_once './Handlers.php';
class RequestMethodMapping {
	private $handlerMap;

	public function __construct() {
		$this->handlerMap = [
			'GET' => new GetHandler(),
			'POST' => new PostHandler(),
			'PUT' => new PutHandler(),
		];
	}

	public function handleRequest($method) {
		if (!isset($this->handlerMap[$method])) {
			http_response_code(405);
			return ['message' => 'Invalid request method'];
		} else {
			return $this->handlerMap[$method]->handle($method);
		}
	}
}