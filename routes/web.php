<?php
$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/contact','TestController@contact');
$router->get('/login', 'UserController@login');
$router->post('/register', 'UserController@register');
$router->get('/user', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);
$router->get('/info','Controller@info');
$router->post('/ajoutter','Controller@ajoutterP');
$router->get('/ajoutterStock','Controller@ajoutterPinfo');
$router->post('/ajoutterStock','Controller@ajoutterS');
