<?php

interface Controller {
	public function handle($request): array;
}

class ActionController implements Controller {
	public function handle($request): array {
        //  тут подключаем модель

		if (!isset($data['name']) || empty($data['name']) || !is_string($data['name']) ) {
			http_response_code(400);
			return ['message' => 'Invalid input'];
		}

		# Sanitization
		$name = strip_tags($data['name']);


		return ['message' => 'Action handled'];
	}
}