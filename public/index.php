<?php
// Elite Digital — Front Controller (PrestaShop-like, PHP 8.2)
// DocumentRoot = /public
declare(strict_types=1);
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

// simple router
$routes = [
  '/' => 'home',
  '/index.php' => 'home',
  '/recondicionados' => 'recondicionados',
  '/configurador' => 'configurador',
  '/configurador-pc' => 'configurador',
];

// API faux endpoints handled via query
if (str_starts_with($uri, '/api/')) {
  header('Content-Type: application/json; charset=utf-8');
  if ($uri === '/api/configurador/components') {
    // demo JSON from sql
    $components = [
      ['id'=>1,'category'=>'cpu','brand'=>'Intel','name'=>'Core i5-13400F','price'=>189.90,'socket'=>'LGA1700','watt'=>65],
      ['id'=>2,'category'=>'cpu','brand'=>'AMD','name'=>'Ryzen 5 7600','price'=>229.90,'socket'=>'AM5','watt'=>65],
      ['id'=>3,'category'=>'motherboard','brand'=>'ASUS','name'=>'PRIME B760M-A','price'=>139.90,'socket'=>'LGA1700','ram_type'=>'DDR4'],
      ['id'=>4,'category'=>'motherboard','brand'=>'MSI','name'=>'B650 GAMING PLUS','price'=>179.90,'socket'=>'AM5','ram_type'=>'DDR5'],
    ];
    echo json_encode(['components'=>$components]);
    exit;
  }
  echo json_encode(['ok'=>true]);
  exit;
}

$page = $routes[$uri] ?? null;
if (!$page) {
  // try prefix
  if (str_starts_with($uri, '/recondicionados')) $page='recondicionados';
  elseif (str_starts_with($uri, '/configurador')) $page='configurador';
  else $page='404';
}

// cart simulation
if (!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if (isset($_GET['add_to_cart'])) {
  $_SESSION['cart'][] = $_GET['add_to_cart'];
  header('Location: '.$uri);
  exit;
}
$cartCount = count($_SESSION['cart']);

function asset($p){ return '/assets/'.ltrim($p,'/'); }

// include template
$title = match($page){
  'home' => 'EliteDigital — Loja powered by PrestaShop',
  'recondicionados' => 'Computadores Recondicionados | Elite Digital',
  'configurador' => 'Configurador de PCs | Elite Digital',
  default => 'Página não encontrada | Elite Digital'
};

ob_start();
if ($page==='home') include __DIR__.'/../templates/pages/home.php';
elseif ($page==='recondicionados') include __DIR__.'/../templates/pages/recondicionados.php';
elseif ($page==='configurador') include __DIR__.'/../templates/pages/configurador.php';
else include __DIR__.'/../templates/pages/404.php';
$content = ob_get_clean();

include __DIR__.'/../templates/layout/layout.php';
