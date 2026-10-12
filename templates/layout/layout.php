<!doctype html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#E30613">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="Elite Digital by Inforlândia — Loja powered by PrestaShop. Informática, computadores INSYS, portáteis, gaming. Aveiro, Portugal.">
  <link rel="icon" href="https://www.elitedigital.pt/img/favicon.ico?1631183047">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= asset('css/theme.css') ?>?v=20261012">
</head>
<body class="lang-pt country-pt currency-eur layout-full-width page-index">
<?php include __DIR__.'/header.php'; ?>

<main id="main-page-content">
  <?= $content ?>
</main>

<?php include __DIR__.'/footer.php'; ?>

<script src="<?= asset('js/app.js') ?>?v=20261012"></script>
</body>
</html>
