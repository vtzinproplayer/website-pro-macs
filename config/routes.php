<?php
// config/routes.php — router simples fiel ao PrestaShop dispatcher
return [
    '/' => ['controller' => 'HomeController', 'action' => 'index'],
    '/recondicionados' => ['controller' => 'RecondicionadosController', 'action' => 'list'],
    '/recondicionados/{id}' => ['controller' => 'RecondicionadosController', 'action' => 'show'],
    '/configurador' => ['controller' => 'ConfiguradorController', 'action' => 'index'],
    '/api/configurador/validate' => ['controller' => 'ConfiguradorController', 'action' => 'validate'],
    '/api/configurador/save' => ['controller' => 'ConfiguradorController', 'action' => 'save'],
    '/api/configurador/components' => ['controller' => 'ConfiguradorController', 'action' => 'components'],
];
