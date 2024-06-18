<?php
include_once './RequestMethodMapping.php';

header("Content-Type: application/json");


$requestMethod = $_SERVER["REQUEST_METHOD"];

$mapping = new RequestMethodMapping();
$data = $mapping->handleRequest($requestMethod);

echo json_encode($data);