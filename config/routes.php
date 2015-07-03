<?php

$app->get('/', function () use ($app) {
	$authors = [
		'authors'=>[
			'name'=>'Erik Figueiredo',
			'email'=>'falecom@erikfigueiredo.com.br',
			'website'=>'http://www.webdevbr.com.br'
		]
	];
    $app->render(null, $authors);
});
