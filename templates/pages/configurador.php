<?php // configurador.php — PC Builder ?>
<div class="breadcrumb">
  <div class="container">
    <a href="/"><i class="fa fa-home"></i> Início</a> <span style="margin:0 6px">/</span> <b>Configurador de PCs</b> <span style="background:var(--red);color:#fff;padding:2px 6px;border-radius:3px;font-size:11px;margin-left:8px">🛠️ NOVO</span>
  </div>
</div>

<div class="container">
  <div style="display:flex;gap:16px;align-items:center;flex-wrap:wrap;padding:16px 0 0">
    <h1 style="margin:0;font-family:Poppins,sans-serif;font-size:24px">🛠️ Configurador de PCs</h1>
    <span style="background:#111;color:#ffea00;padding:5px 10px;border-radius:4px;font-size:12px;font-weight:700">Compatibilidade em tempo real • Montagem grátis</span>
    <span style="margin-left:auto;font-size:13px;color:#555">Passo <b id="stepCounter">1/8</b> • <a href="#" style="color:var(--red)">Como funciona?</a></span>
  </div>
  <p style="margin:4px 0 0;color:#555;font-size:13.5px">Escolha cada componente e veja o preço e compatibilidade atualizados ao segundo. Alertas automáticos de socket, RAM, PSU e tamanho de caixa.</p>
</div>

<div id="configurator-root" class="container configurator">
  <!-- COLUNA ESQUERDA — STEPS + COMPONENTES -->
  <div>
    <!-- STEPS NAV -->
    <div class="steps">
      <div class="step active" data-step="cpu"><div class="step-head"><h4>1. Processador (CPU)</h4><span class="step-price">—</span></div><small>Intel LGA1700 / AMD AM5</small></div>
      <div class="step" data-step="motherboard"><div class="step-head"><h4>2. Placa Mãe</h4><span class="step-price">—</span></div><small>Filtrada por socket do CPU</small></div>
      <div class="step" data-step="ram"><div class="step-head"><h4>3. Memória RAM</h4><span class="step-price">—</span></div><small>DDR4 vs DDR5 conforme board</small></div>
      <div class="step" data-step="gpu"><div class="step-head"><h4>4. Placa Gráfica</h4><span class="step-price">—</span></div><small>Verifica comprimento vs caixa</small></div>
      <div class="step" data-step="storage"><div class="step-head"><h4>5. Armazenamento</h4><span class="step-price">—</span></div><small>NVMe / SATA</small></div>
      <div class="step" data-step="case"><div class="step-head"><h4>6. Caixa</h4><span class="step-price">—</span></div><small>ATX / mATX — verifica GPU</small></div>
      <div class="step" data-step="psu"><div class="step-head"><h4>7. Fonte (PSU)</h4><span class="step-price">—</span></div><small>Calculadora watts automática</small></div>
      <div class="step" data-step="cooler"><div class="step-head"><h4>8. Refrigeração</h4><span class="step-price">—</span></div><small>Air / AIO</small></div>
    </div>

    <!-- COMPONENTES -->
    <div style="margin-top:14px;border:1px solid var(--border);border-radius:6px;background:#fff;overflow:hidden">
      <div style="padding:10px 12px;background:#f9f9f9;border-bottom:1px solid var(--border);display:flex;justify-content:space-between;align-items:center">
        <b style="font-size:13px">Selecione o componente</b>
        <span style="font-size:11px;color:#888">Compatíveis destacados</span>
      </div>

      <!-- CPU LIST -->
      <div class="components-list" data-list="cpu">
        <div class="comp-card" data-comp-id="cpu-i5" data-comp-name="Core i5-13400F">
          <img src="https://images.unsplash.com/photo-1555617117-2412cc290a4a?w=100&auto=format&fit=crop&q=60" alt="CPU">
          <div class="comp-info"><b>Intel Core i5-13400F 10-Core 4.6GHz</b><small>LGA1700 • 65W • 16 Threads</small></div>
          <div class="comp-price">189,90 €</div>
          <button class="comp-add" data-pick="cpu" data-comp-id="cpu-i5">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="cpu-i7" data-comp-name="Core i7-14700F">
          <img src="https://images.unsplash.com/photo-1555617117-2412cc290a4a?w=100&auto=format&fit=crop&q=60" alt="CPU">
          <div class="comp-info"><b>Intel Core i7-14700F 20-Core 5.4GHz</b><small>LGA1700 • 65W • Best for gaming</small></div>
          <div class="comp-price">389,90 €</div>
          <button class="comp-add" data-pick="cpu" data-comp-id="cpu-i7">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="cpu-r5" data-comp-name="Ryzen 5 7600">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="CPU">
          <div class="comp-info"><b>AMD Ryzen 5 7600 6-Core 5.1GHz</b><small>AM5 • 65W • DDR5</small></div>
          <div class="comp-price">229,90 €</div>
          <button class="comp-add" data-pick="cpu" data-comp-id="cpu-r5">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="cpu-r7" data-comp-name="Ryzen 7 7800X3D">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="CPU">
          <div class="comp-info"><b>AMD Ryzen 7 7800X3D 8-Core</b><small>AM5 • 120W • X3D Gaming King</small></div>
          <div class="comp-price">449,00 €</div>
          <button class="comp-add" data-pick="cpu" data-comp-id="cpu-r7">Escolher</button>
        </div>
      </div>

      <!-- MOTHERBOARD -->
      <div class="components-list" data-list="motherboard" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="mb-b760" data-comp-name="ASUS PRIME B760M-A WIFI">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=100&auto=format&fit=crop&q=60" alt="MB">
          <div class="comp-info"><b>ASUS PRIME B760M-A WIFI DDR4</b><small>LGA1700 • mATX • 2x M.2 • Wi-Fi</small></div>
          <div class="comp-price">139,90 €</div>
          <button class="comp-add" data-pick="motherboard" data-comp-id="mb-b760">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="mb-b650" data-comp-name="MSI B650 GAMING PLUS WIFI">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=100&auto=format&fit=crop&q=60" alt="MB">
          <div class="comp-info"><b>MSI B650 GAMING PLUS WIFI DDR5</b><small>AM5 • ATX • 3x M.2 • Wi-Fi</small></div>
          <div class="comp-price">179,90 €</div>
          <button class="comp-add" data-pick="motherboard" data-comp-id="mb-b650">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="mb-z790" data-comp-name="Gigabyte Z790 AORUS ELITE">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=100&auto=format&fit=crop&q=60" alt="MB">
          <div class="comp-info"><b>Gigabyte Z790 AORUS ELITE DDR5</b><small>LGA1700 • ATX • 4x M.2 • OC</small></div>
          <div class="comp-price">269,90 €</div>
          <button class="comp-add" data-pick="motherboard" data-comp-id="mb-z790">Escolher</button>
        </div>
      </div>

      <!-- RAM -->
      <div class="components-list" data-list="ram" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="ram-16-ddr4" data-comp-name="Corsair 16GB DDR4 3200">
          <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=100&auto=format&fit=crop&q=60" alt="RAM">
          <div class="comp-info"><b>Corsair Vengeance 16GB (2x8) DDR4 3200MHz CL16</b><small>DDR4 • Para B760 DDR4</small></div>
          <div class="comp-price">49,90 €</div>
          <button class="comp-add" data-pick="ram" data-comp-id="ram-16-ddr4">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="ram-32-ddr5" data-comp-name="Kingston 32GB DDR5 5600">
          <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=100&auto=format&fit=crop&q=60" alt="RAM">
          <div class="comp-info"><b>Kingston FURY Beast 32GB (2x16) DDR5 5600MHz</b><small>DDR5 • Para B650/Z790</small></div>
          <div class="comp-price">119,90 €</div>
          <button class="comp-add" data-pick="ram" data-comp-id="ram-32-ddr5">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="ram-trident" data-comp-name="G.Skill 32GB DDR5 6000">
          <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=100&auto=format&fit=crop&q=60" alt="RAM">
          <div class="comp-info"><b>G.Skill Trident Z5 32GB DDR5 6000 CL30</b><small>DDR5 • EXPO/XMP</small></div>
          <div class="comp-price">139,90 €</div>
          <button class="comp-add" data-pick="ram" data-comp-id="ram-trident">Escolher</button>
        </div>
      </div>

      <!-- GPU -->
      <div class="components-list" data-list="gpu" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="gpu-4060" data-comp-name="ASUS RTX 4060 8GB">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="GPU">
          <div class="comp-info"><b>ASUS GeForce RTX 4060 Dual OC 8GB</b><small>115W • 227mm • HDMI+3xDP</small></div>
          <div class="comp-price">329,90 €</div>
          <button class="comp-add" data-pick="gpu" data-comp-id="gpu-4060">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="gpu-4070" data-comp-name="MSI RTX 4070 SUPER 12GB">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="GPU">
          <div class="comp-info"><b>MSI RTX 4070 SUPER 12GB</b><small>220W • 307mm • Requer 650W</small></div>
          <div class="comp-price">629,90 €</div>
          <button class="comp-add" data-pick="gpu" data-comp-id="gpu-4070">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="gpu-7600" data-comp-name="Sapphire RX 7600 8GB">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="GPU">
          <div class="comp-info"><b>Sapphire RX 7600 Pulse 8GB</b><small>165W • 240mm • Ótimo custo/benefício</small></div>
          <div class="comp-price">269,90 €</div>
          <button class="comp-add" data-pick="gpu" data-comp-id="gpu-7600">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="gpu-5070" data-comp-name="Zotac RTX 5070 Ti 16GB">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="GPU">
          <div class="comp-info"><b>Zotac RTX 5070 Ti SOLID 16GB GDDR7</b><small>300W • 320mm • SFF</small></div>
          <div class="comp-price">899,90 €</div>
          <button class="comp-add" data-pick="gpu" data-comp-id="gpu-5070">Escolher</button>
        </div>
      </div>

      <!-- STORAGE -->
      <div class="components-list" data-list="storage" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="ssd-1tb" data-comp-name="Samsung 980 PRO 1TB">
          <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=100&auto=format&fit=crop&q=60" alt="SSD">
          <div class="comp-info"><b>Samsung 980 PRO 1TB NVMe PCIe 4.0</b><small>7000 MB/s • M.2</small></div>
          <div class="comp-price">89,90 €</div>
          <button class="comp-add" data-pick="storage" data-comp-id="ssd-1tb">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="ssd-2tb" data-comp-name="WD Black SN770 2TB">
          <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=100&auto=format&fit=crop&q=60" alt="SSD">
          <div class="comp-info"><b>WD Black SN770 2TB NVMe</b><small>5150 MB/s • Ideal gaming</small></div>
          <div class="comp-price">129,90 €</div>
          <button class="comp-add" data-pick="storage" data-comp-id="ssd-2tb">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="hdd-2tb" data-comp-name="Seagate 2TB HDD">
          <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=100&auto=format&fit=crop&q=60" alt="HDD">
          <div class="comp-info"><b>Seagate Barracuda 2TB 7200rpm</b><small>SATA • Armazenamento extra</small></div>
          <div class="comp-price">59,90 €</div>
          <button class="comp-add" data-pick="storage" data-comp-id="hdd-2tb">Escolher</button>
        </div>
      </div>

      <!-- CASE -->
      <div class="components-list" data-list="case" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="case-m100" data-comp-name="MSI MAG FORGE M100A">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=100&auto=format&fit=crop&q=60" alt="Case">
          <div class="comp-info"><b>MSI MAG FORGE M100A mATX</b><small>Vidro • 4 fans • máx GPU 300mm</small></div>
          <div class="comp-price">49,90 €</div>
          <button class="comp-add" data-pick="case" data-comp-id="case-m100">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="case-h5" data-comp-name="NZXT H5 Flow ATX">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=100&auto=format&fit=crop&q=60" alt="Case">
          <div class="comp-info"><b>NZXT H5 Flow ATX Mid Tower</b><small>Malha • máx GPU 365mm</small></div>
          <div class="comp-price">99,90 €</div>
          <button class="comp-add" data-pick="case" data-comp-id="case-h5">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="case-4000" data-comp-name="Corsair 4000D Airflow">
          <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=100&auto=format&fit=crop&q=60" alt="Case">
          <div class="comp-info"><b>Corsair 4000D Airflow ATX</b><small>Airflow • máx GPU 360mm</small></div>
          <div class="comp-price">94,90 €</div>
          <button class="comp-add" data-pick="case" data-comp-id="case-4000">Escolher</button>
        </div>
      </div>

      <!-- PSU -->
      <div class="components-list" data-list="psu" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="psu-550" data-comp-name="Corsair CV550 550W">
          <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=100&auto=format&fit=crop&q=60" alt="PSU">
          <div class="comp-info"><b>Corsair CV550 550W 80+ Bronze</b><small>Não modular • Para builds 65W+115W</small></div>
          <div class="comp-price">54,90 €</div>
          <button class="comp-add" data-pick="psu" data-comp-id="psu-550">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="psu-650" data-comp-name="Seasonic GX 650W">
          <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=100&auto=format&fit=crop&q=60" alt="PSU">
          <div class="comp-info"><b>Seasonic Focus GX 650W 80+ Gold Modular</b><small>Modular • Recomendado RTX 4070</small></div>
          <div class="comp-price">89,90 €</div>
          <button class="comp-add" data-pick="psu" data-comp-id="psu-650">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="psu-850" data-comp-name="Be Quiet Straight 850W">
          <img src="https://images.unsplash.com/photo-1591799264318-7e6ef8ddb7ea?w=100&auto=format&fit=crop&q=60" alt="PSU">
          <div class="comp-info"><b>Be Quiet! Straight Power 850W Gold</b><small>Modular • Para RTX 5070 Ti</small></div>
          <div class="comp-price">129,90 €</div>
          <button class="comp-add" data-pick="psu" data-comp-id="psu-850">Escolher</button>
        </div>
      </div>

      <!-- COOLER -->
      <div class="components-list" data-list="cooler" style="border-top:1px solid #f0f0f0">
        <div class="comp-card" data-comp-id="cool-212" data-comp-name="Cooler Master Hyper 212">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="Cooler">
          <div class="comp-info"><b>Cooler Master Hyper 212 Black</b><small>Air • 159mm altura</small></div>
          <div class="comp-price">39,90 €</div>
          <button class="comp-add" data-pick="cooler" data-comp-id="cool-212">Escolher</button>
        </div>
        <div class="comp-card" data-comp-id="cool-240" data-comp-name="Arctic Liquid Freezer II 240">
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=100&auto=format&fit=crop&q=60" alt="Cooler">
          <div class="comp-info"><b>Arctic Liquid Freezer II 240 AIO</b><small>AIO 240mm • Para i7/R7</small></div>
          <div class="comp-price">89,90 €</div>
          <button class="comp-add" data-pick="cooler" data-comp-id="cool-240">Escolher</button>
        </div>
      </div>
    </div>
  </div>

  <!-- COLUNA DIREITA — RESUMO -->
  <div>
    <div class="summary">
      <div class="summary-head">
        <h3><i class="fa fa-shopping-cart"></i> Resumo da Build</h3>
        <span style="background:#ffea00;color:#111;padding:3px 8px;border-radius:3px;font-size:11px;font-weight:700">PREÇO LIVE</span>
      </div>
      <div class="summary-body">
        <div id="compatBox"></div>

        <div id="summary-items" style="min-height:80px"></div>

        <div class="summary-total"><span>Total</span><span id="summary-total">0,00 €</span></div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;font-size:12px;margin:10px 0">
          <div style="background:#f9f9f9;border:1px solid var(--border);border-radius:4px;padding:8px;text-align:center"><div style="color:#888">Potência estimada</div><b id="summary-watt">0 W</b></div>
          <div style="background:#f9f9f9;border:1px solid var(--border);border-radius:4px;padding:8px;text-align:center"><div style="color:#888">PSU recomendado</div><b id="summary-needed">—</b></div>
        </div>
        <div class="watt-bar"><div id="wattFill" class="watt-fill" style="width:0%"></div></div>
        <div style="font-size:11px;color:#888;text-align:center">Watts / PSU selecionada</div>

        <button id="btnSave" class="btn btn-red" style="width:100%;margin-top:12px;justify-content:center">💾 Guardar & Partilhar Build</button>
        <button class="btn btn-dark" style="width:100%;margin-top:8px;justify-content:center" onclick="alert('Adicionado ao carrinho PrestaShop como pack CFG-2026 (demo). Redirecionaria para /carrinho')"><i class="fa fa-shopping-cart"></i> Adicionar Build ao Carrinho</button>
        <button class="btn btn-outline" style="width:100%;margin-top:8px;justify-content:center" onclick="window.print()"><i class="fa fa-file-pdf-o"></i> Gerar PDF Orçamento</button>

        <div class="share-box">
          <input id="shareLink" type="text" placeholder="Link partilhável aparecerá aqui" readonly>
          <button class="btn btn-outline" onclick="navigator.clipboard.writeText(document.getElementById('shareLink').value); alert('Link copiado!')">Copiar</button>
        </div>

        <div style="margin-top:12px;background:#e6f7e6;border:1px solid #a3d9a3;border-radius:4px;padding:10px;font-size:12px;line-height:1.4">
          <b>✅ Montagem grátis Inforlândia</b><br>
          Montagem, gestão de cabos, instalação drivers e testes stress 24h incluídos. Garantia total 3 anos no sistema.
        </div>
      </div>
    </div>

    <div style="margin-top:12px;border:1px solid var(--border);border-radius:6px;background:#fff;padding:12px">
      <h4 style="margin:0 0 8px;font-size:13px"><i class="fa fa-question-circle" style="color:var(--red)"></i> Precisa de ajuda?</h4>
      <p style="margin:0 0 8px;font-size:12px;color:#555">Fale com um técnico Inforlândia — orçamentos sem compromisso.</p>
      <a href="#" style="font-size:13px;color:var(--red);font-weight:700"><i class="fa fa-phone"></i> 234 340 800</a> <span style="font-size:12px;color:#888">•</span> <a href="#" style="font-size:13px;color:var(--red);font-weight:700"><i class="fa fa-comments"></i> Chat</a>
    </div>
  </div>
</div>
