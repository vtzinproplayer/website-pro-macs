<?php
// config/routes.php — router PrestaShop-like
return [
    '/' => ['controller' => 'HomeController', 'action' => 'index'],
    '/recondicionados' => ['controller' => 'RecondicionadosController', 'action' => 'list'],
    '/recondicionados/{id}' => ['controller' => 'RecondicionadosController', 'action' => 'show'],
    '/assistente' => ['controller' => 'AiAssistantController', 'action' => 'index'],
    '/assistente-ai' => ['controller' => 'AiAssistantController', 'action' => 'index'],
    '/assistente-ia' => ['controller' => 'AiAssistantController', 'action' => 'index'],
    // legacy redirect
    '/configurador' => ['controller' => 'AiAssistantController', 'action' => 'index'],
    '/configurador-pc' => ['controller' => 'AiAssistantController', 'action' => 'index'],
    '/api/ai/recommend' => ['controller' => 'AiAssistantController', 'action' => 'recommend'],
    '/api/ai/chat' => ['controller' => 'AiAssistantController', 'action' => 'chat'],
];
