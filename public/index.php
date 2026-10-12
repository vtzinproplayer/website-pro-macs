<?php
// Elite Digital — Front Controller (PrestaShop-like, PHP 8.2)
declare(strict_types=1);
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '') $uri = '/';

$routes = [
  '/' => 'home',
  '/index.php' => 'home',
  '/recondicionados' => 'recondicionados',
  '/assistente' => 'assistente',
  '/assistente-ai' => 'assistente',
  '/assistente-ia' => 'assistente',
  '/configurador' => 'assistente', // legacy redirect
  '/configurador-pc' => 'assistente',
];

if (str_starts_with($uri, '/api/')) {
  header('Content-Type: application/json; charset=utf-8');
  if ($uri === '/api/ai/recommend') {
    $input = json_decode(file_get_contents('php://input'), true) ?? $_GET;
    $uso = $input['uso'] ?? 'escritorio';
    $orc = (int)($input['orcamento'] ?? 600);
    // demo rule-based AI
    $rec = match(true){
      $uso==='gaming' && $orc>=1000 => ['tipo'=>'novo','titulo'=>'Build Gaming 1440p: R7 7800X3D + RTX 4070 SUPER','preco'=>1429,'id'=>'build-gaming-pro'],
      $uso==='gaming' => ['tipo'=>'recondicionado','titulo'=>'Recondicionado: HP Omen i5-12400F RTX 3060 — Grade A+','preco'=>649,'id'=>'rc-hp-omen'],
      $uso==='universidade' => ['tipo'=>'recondicionado','titulo'=>'Lenovo ThinkPad T14s i7 — Grade A+ 549€ (leve, 14h bateria)','preco'=>549,'id'=>'rc-lenovo'],
      default => ['tipo'=>'recondicionado','titulo'=>'Dell Latitude 5540 i5 — Grade A+ 549€ (melhor custo/benefício)','preco'=>549,'id'=>'rc-dell']
    };
    echo json_encode(['recomendacao'=>$rec,'explicacao'=>'IA Elite: escolha com melhor fps/€ e garantia 24m.']);
    exit;
  }
  echo json_encode(['ok'=>true]);
  exit;
}

$page = $routes[$uri] ?? null;
if (!$page) {
  if (str_starts_with($uri, '/recondicionados')) $page='recondicionados';
  elseif (str_starts_with($uri, '/assistente')) $page='assistente';
  elseif (str_starts_with($uri, '/configurador')) $page='assistente';
  else $page='404';
}

if (!isset($_SESSION['cart'])) $_SESSION['cart']=[];
if (isset($_GET['add_to_cart'])) {
  $_SESSION['cart'][] = $_GET['add_to_cart'];
  header('Location: '.$uri);
  exit;
}
$cartCount = count($_SESSION['cart']);
function asset($p){ return '/assets/'.ltrim($p,'/'); }

$title = match($page){
  'home' => 'EliteDigital — Loja powered by PrestaShop',
  'recondicionados' => 'Catálogo Recondicionados + AI | Elite Digital',
  'assistente' => 'Assistente AI Elite — Monte o seu PC com ajuda | Elite Digital',
  default => 'Página não encontrada | Elite Digital'
};

ob_start();
if ($page==='home') include __DIR__.'/../templates/pages/home.php';
elseif ($page==='recondicionados') include __DIR__.'/../templates/pages/recondicionados.php';
elseif ($page==='assistente') include __DIR__.'/../templates/pages/assistente.php';
else include __DIR__.'/../templates/pages/404.php';
$content = ob_get_clean();

include __DIR__.'/../templates/layout/layout.php';
