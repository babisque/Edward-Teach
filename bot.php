<?php

include __DIR__ . '/vendor/autoload.php';

use App\Edward\Service\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$bot = new Client();