<?php
// header.php — replica fiel do header Elite Digital + Warehouse
?>
<!-- TOPBAR preto fino -->
<div class="topbar">
  <div class="container">
    <div class="topbar-left">
      <span><i class="fa fa-phone"></i> 234 340 800 <small>(Chamada rede fixa nacional)</small></span>
      <span class="sep">|</span>
      <a href="#"><i class="fa fa-envelope-o"></i> apoio@elitedigital.pt</a>
      <span class="sep">|</span>
      <a href="#"><i class="fa fa-map-marker"></i> Aveiro — Inforlândia</a>
    </div>
    <div class="topbar-right">
      <a href="#">Acompanhar Encomenda</a>
      <span class="sep">|</span>
      <a href="#">Lojas</a>
      <span class="sep">|</span>
      <a href="#">Contacte-nos</a>
      <span class="sep">|</span>
      <a href="#"><i class="fa fa-user-o"></i> Iniciar sessão</a>
    </div>
  </div>
</div>

<header id="header" class="desktop-header-style-w-2">
  <div class="header-main">
    <div class="container header-grid">
      <!-- LOGO -->
      <a href="/" class="logo">
        <img src="https://www.elitedigital.pt/img/loja-prestashop-2-logo-1631183047.jpg" alt="Elite Digital" width="170" height="52">
      </a>

      <!-- SEARCH — largo centro como no original -->
      <div class="search-wrap">
        <form action="/pesquisa" method="get" class="search-form">
          <input type="text" name="s" placeholder="Pesquisar no catálogo..." autocomplete="off">
          <select class="search-cat">
            <option>Todas as categorias</option>
            <option>Portáteis</option>
            <option>Desktops</option>
            <option>Componentes</option>
            <option>Periféricos</option>
          </select>
          <button type="submit" aria-label="Pesquisar"><i class="fa fa-search"></i></button>
        </form>
      </div>

      <!-- ICONS -->
      <div class="header-icons">
        <a href="#" class="hi"><i class="fa fa-heart-o"></i><span class="hi-label">Favoritos<br><b>0</b></span></a>
        <a href="#" class="hi"><i class="fa fa-balance-scale"></i><span class="hi-label">Comparar<br><b>0</b></span></a>
        <a href="#" class="hi"><i class="fa fa-user-o"></i><span class="hi-label">Olá, entre<br><b>Minha conta</b></span></a>
        <a href="#" class="hi cart">
          <span class="cart-icon"><i class="fa fa-shopping-cart"></i><span class="cart-count">0</span></span>
          <span class="hi-label">Carrinho<br><b>0,00 €</b></span>
        </a>
      </div>
    </div>
  </div>

  <!-- MEGAMENU vermelho sticky -->
  <nav class="megamenu">
    <div class="container megamenu-inner">
      <a href="#" class="mm-toggle"><i class="fa fa-bars"></i> TODAS AS CATEGORIAS</a>
      <ul class="mm-links">
        <li><a href="/">INÍCIO</a></li>
        <li class="has-sub"><a href="#">COMPUTADORES <i class="fa fa-angle-down"></i></a></li>
        <li class="has-sub"><a href="#">COMPONENTES <i class="fa fa-angle-down"></i></a></li>
        <li class="has-sub"><a href="#">PERIFÉRICOS <i class="fa fa-angle-down"></i></a></li>
        <li><a href="#">REDE</a></li>
        <li><a href="#">IMPRESSÃO</a></li>
        <li><a href="#">SOFTWARE</a></li>
        <li><a href="#">SERVIÇOS</a></li>
        <!-- NOVAS FEATURES -->
        <li class="mm-new"><a href="/recondicionados"><span class="badge-new">NOVO</span> ♻️ RECONDICIONADOS</a></li>
        <li class="mm-new highlight"><a href="/configurador"><span class="badge-new">NOVO</span> 🛠️ CONFIGURADOR</a></li>
        <li><a href="#" style="color:#ffea00">CAMPANHAS</a></li>
      </ul>
      <div class="mm-promo">
        <i class="fa fa-truck"></i> Portes grátis > 75€
      </div>
    </div>
  </nav>

  <!-- MEGA dropdown demo (hidden by CSS hover) -->
  <div class="mega-dropdown">
    <div class="container mega-grid">
      <div><h4>Desktops</h4><a href="#">Desktops Standard</a><a href="#">Desktops Gaming</a><a href="#">Desktops Empresariais</a><a href="#">All-in-One</a><a href="#">Workstations</a></div>
      <div><h4>Portáteis</h4><a href="#">Portáteis Standard</a><a href="#">Portáteis Gaming</a><a href="#">Portáteis Empresariais</a><a href="#">Rugged</a></div>
      <div><h4>Componentes</h4><a href="#">Placas Mãe</a><a href="#">Processadores</a><a href="#">Memória</a><a href="#">Placas Gráficas</a><a href="#">Armazenamento</a></div>
      <div><h4>Periféricos</h4><a href="#">Monitores</a><a href="#">Teclados & Ratos</a><a href="#">Impressoras</a><a href="#">Networking</a></div>
      <div class="mega-banner">
        <img src="https://www.elitedigital.pt/img/cms/Banners/14gen/Banner_ELITE_dotFORCE_14th_PT.jpg" alt="INSYS 14th Gen">
        <p>Novos dotFORCE 14ª Geração</p>
      </div>
    </div>
  </div>

  <!-- BREADCRUMB for inner pages injected via JS -->
</header>
