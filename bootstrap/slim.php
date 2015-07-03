<?php

/**
 * Inicia e configura o Slim para lidar com json e reportar erros
 */

$app = new \Slim\Slim();
$app->config([
    'debug' => true,
    'view' => new WebDevBr\Mvc\View\Json()
]);

$app->response->headers->set('Content-Type', 'application/json');

$app->error(function () use ($app) {
	require __DIR__.'/slim_error.php';
});

$app->notFound(function () use ($app) {
	$app->render(null, [['message'=>'Page Not Found']]);
});

/**
 * Inicia o objeto que carrega os controllers
 */

$loader = new WebDevBr\Mvc\Loader();

/**
 * Configura as rotas padrão para os controllers
 */

$routes_controller = ['controller'=>'[a-zA-Z]+', 'id'=>'[0-9]+'];

$app->get('/:controller', function ($controller) use ($app, $loader) {
    $app->render(null, [$loader->getController($app, $controller, 'viewAll')]);
})->conditions($routes_controller);

$app->get('/:controller/:id', function ($controller, $id) use ($app, $loader) {
    $app->render(null, [$loader->getController($app, $controller, 'viewOne', $id)]);
})->conditions($routes_controller);

$app->post('/:controller', function ($controller) use ($app, $loader) {
    $app->render(null, [$loader->getController($app, $controller, 'create')]);
})->conditions($routes_controller);

$app->map('/:controller/:id', function ($controller, $id) use ($app, $loader) {
    $app->render(null, [$loader->getController($app, $controller, 'update', $id)]);
})->conditions($routes_controller)->via('POST', 'PUT');

$app->delete('/:controller/:id', function ($controller, $id) use ($app, $loader) {
    $app->render(null, [$loader->getController($app, $controller, 'delete', $id)]);
})->conditions($routes_controller);

/**
 * Métodos personalizados nos controllers
 * A url /user/teste vai carregar UserController::teste($params)
 */

$app->get('/:controller/:action(/:params+)', function ($controller, $action, $params = []) use ($app, $loader) {
    $app->render(null, [$loader->getController($app, $controller, $action.'Action', $params)]);
});

/**
 * Carrega as rotas criadas pelo usuário
 */

require __DIR__.'/../config/routes.php';

$app->run();