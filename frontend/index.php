<?php

require_once __DIR__ . '/app/CharacterApi.php';
require_once __DIR__ . '/app/CharacterController.php';

// Leer la URL del backend desde variable de entorno
$apiBaseUrl = getenv("API_BASE_URL") ?: "http://localhost:8080/characters";

$api = new CharacterApi($apiBaseUrl);
$controller = new CharacterController($api);
$controller->listCharactersGrid();