<?php

require_once 'Controllers//SecurityController.php';
require_once 'Controllers//BoardController.php';


class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'emailConfirm' => [
                'controller' => 'SecurityController',
                'action' => 'emailConfirm'
            ],
            'home' => [
                'controller' => 'BoardController',
                'action' => 'loadHome'
            ],
            'about' => [
                'controller' => 'BoardController',
                'action' => 'loadAbout'
            ],
            'delivery' => [
                'controller' => 'BoardController',
                'action' => 'loadDelivery'
            ],
            'payments' => [
                'controller' => 'BoardController',
                'action' => 'loadPayments'
            ],
            'contact' => [
                'controller' => 'BoardController',
                'action' => 'loadContact'
            ],
            'account' => [
                'controller' => 'BoardController',
                'action' => 'loadAccount'
            ],
            'cart' => [
                'controller' => 'BoardController',
                'action' => 'loadCart'
            ],
            'products' => [
                'controller' => 'BoardController',
                'action' => 'loadProducts'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}