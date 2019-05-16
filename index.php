<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';

$request = Request::createFromGlobals();

$name = $request->query->get('name', 'World');

$response = new Response(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));

$response->prepare($request)->send();