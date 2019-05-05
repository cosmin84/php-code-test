<?php

require __DIR__ . '/vendor/autoload.php';

use App\ConcreteApi;
use App\JsonResults;

$foobar = new ConcreteApi('json', new JsonResults());

var_dump($foobar->getBooksByAuthor('Smith'));