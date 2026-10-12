<?php // recondicionados.php ?>
<div class="breadcrumb">
  <div class="container">
    <a href="/"><i class="fa fa-home"></i> Início</a> <span style="margin:0 6px">/</span> <b>Computadores Recondicionados</b> <span style="background:#1a9e1a;color:#fff;padding:2px 6px;border-radius:3px;font-size:11px;margin-left:8px">♻️ NOVO</span>
  </div>
</div>

<div class="container">
  <div style="background:linear-gradient(135deg,#0f5e3a,#1a9e5e);color:#fff;border-radius:8px;padding:18px;margin:16px 0;display:flex;gap:16px;align-items:center;flex-wrap:wrap">
    <div style="font-size:42px">♻️</div>
    <div style="flex:1;min-width:280px">
      <h1 style="margin:0;font-family:Poppins,sans-serif;font-size:22px">Computadores Recondicionados Certificados</h1>
      <p style="margin:4px 0 0;opacity:.9;font-size:13.5px">Revisão completa Inforlândia • Fotos reais de cada exemplar • Bateria testada • Garantia 12-24 meses • Até 45% mais barato vs novo • <b>Poupança média 285kg CO₂</b></p>
    </div>
    <div style="background:#fff;color:#0f5e3a;border-radius:6px;padding:10px 14px;text-align:center;min-width:160px">
      <div style="font-size:28px;font-weight:800;line-height:1">47</div><div style="font-size:12px;font-weight:700">EQUIPAMENTOS<br>DISPONÍVEIS</div>
    </div>
  </div>
</div>

<div class="container layout-with-sidebar">
  <!-- SIDEBAR FILTROS — estilo Warehouse -->
  <aside class="filters">
    <h3>FILTRAR POR <span id="filterCount" style="background:var(--red);color:#fff;padding:2px 7px;border-radius:10px;font-size:11px">6 produtos</span></h3>

    <div class="filter-group">
      <h4>Grade (Estado Estético) <i class="fa fa-info-circle" title="A+ como novo, A excelente, B bom"></i></h4>
      <label><input type="checkbox" data-filter-grade value="A+"> Grade A+ — Como novo <span style="margin-left:auto;color:#1a9e1a;font-weight:700">•</span></label>
      <label><input type="checkbox" data-filter-grade value="A"> Grade A — Excelente</label>
      <label><input type="checkbox" data-filter-grade value="B"> Grade B — Bom</label>
    </div>

    <div class="filter-group">
      <h4>Garantia</h4>
      <label><input type="checkbox" data-filter-warranty value="24"> 24 meses (certificado)</label>
      <label><input type="checkbox" data-filter-warranty value="12"> 12 meses</label>
    </div>

    <div class="filter-group">
      <h4>Marca</h4>
      <label><input type="checkbox"> Dell (12)</label>
      <label><input type="checkbox"> Lenovo (10)</label>
      <label><input type="checkbox"> HP (8)</label>
      <label><input type="checkbox"> ASUS (6)</label>
      <label><input type="checkbox"> Apple (5)</label>
    </div>

    <div class="filter-group">
      <h4>Preço</h4>
      <input type="range" id="priceRange" min="200" max="1200" value="1200" class="filter-range">
      <div style="display:flex;justify-content:space-between;font-size:12px;color:#555;margin-top:4px"><span>200 €</span><b id="priceRangeVal">1200 €</b></div>
    </div>

    <div class="filter-group">
      <h4>Inclui</h4>
      <label><input type="checkbox" checked> Carregador original ✓</label>
      <label><input type="checkbox"> Caixa original</label>
      <label><input type="checkbox" checked> Fotos reais ✓</label>
      <label><input type="checkbox" checked> Relatório bateria ✓</label>
    </div>

    <div class="filter-group" style="background:#f0f9f0;border:1px solid #a3d9a3;margin:10px;border-radius:6px">
      <h4 style="color:#0f5e3a"><i class="fa fa-leaf"></i> Sustentabilidade</h4>
      <p style="font-size:12px;color:#333;margin:6px 0 0;line-height:1.4">Cada recondicionado poupa em média <b>285kg CO₂</b> e 1 200L de água vs produzir um novo.</p>
    </div>

    <div style="padding:12px">
      <button onclick="document.querySelectorAll('[data-filter-grade],[data-filter-warranty]').forEach(c=>c.checked=false);document.getElementById('priceRange').value=1200;document.dispatchEvent(new Event('DOMContentLoaded'))" style="width:100%;border:1px solid var(--border);background:#fff;padding:8px;border-radius:4px;font-size:12px;cursor:pointer">Limpar filtros</button>
    </div>
  </aside>

  <!-- PRODUTOS -->
  <div>
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;gap:12px;flex-wrap:wrap">
      <div style="font-size:13px;color:#555"><b>6</b> produtos • Ordenar por:
        <select style="border:1px solid var(--border);border-radius:4px;padding:6px;margin-left:6px">
          <option>Relevância</option><option>Preço: menor primeiro</option><option>Preço: maior primeiro</option><option>Grade: A+ primeiro</option>
        </select>
      </div>
      <div style="display:flex;gap:6px">
        <button class="btn-icon" style="background:var(--red);color:#fff;border-color:var(--red)"><i class="fa fa-th"></i></button>
        <button class="btn-icon"><i class="fa fa-list"></i></button>
      </div>
    </div>

    <div class="products-grid" id="recondGrid">
      <!-- 6 produtos demo -->
      <div class="p-card" data-grade="A+" data-warranty="24" data-price="549.90">
        <div class="p-card-img">
          <span class="badge badge-new2">-38%</span><span class="badge-grade grade-Aplus" style="top:36px">Grade A+</span>
          <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&auto=format&fit=crop&q=60" alt="Dell">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • Dell • ♻️ 312kg CO₂ poupados</div>
          <h3 class="p-card-title"><a href="#">Dell Latitude 5540 i5-1345U 16GB 512GB NVMe 15.6" FHD — Como novo</a></h3>
          <div class="p-card-ref">RC-DELL-5540-A+ • 42 ciclos • 97% saúde • Sem marcas</div>
          <p class="p-card-desc">Equipamento empresarial com revisão 30 pontos Inforlândia. Fotos reais. Teclado PT, carregador 65W incluído. Bateria 97%.</p>
          <div class="p-card-price"><span class="price">549,90 €</span><span class="price-old">889,00 €</span></div>
          <div style="display:flex;gap:6px;margin-top:6px;flex-wrap:wrap"><span style="font-size:11px;background:#e6f7e6;color:#0a6b0a;padding:3px 6px;border-radius:3px">✓ 24 meses garantia</span><span style="font-size:11px;background:#e6f0ff;color:#0a3d8a;padding:3px 6px;border-radius:3px">Fotos reais</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="Dell A+"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn-icon"><i class="fa fa-heart-o"></i></button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A" data-warranty="24" data-price="629.00">
        <div class="p-card-img">
          <span class="badge badge-new2">-42%</span><span class="badge-grade grade-A" style="top:36px">Grade A</span>
          <img src="https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=400&auto=format&fit=crop&q=60" alt="Lenovo">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • Lenovo</div>
          <h3 class="p-card-title"><a href="#">Lenovo ThinkPad T14s Gen3 i7-1260P 16GB 1TB 14" WUXGA</a></h3>
          <div class="p-card-ref">RC-LEN-T14S-A • 128 ciclos • 89% saúde • Micro-riscos tampa</div>
          <p class="p-card-desc">ThinkPad empresarial, teclado retroiluminado PT, leitor impressão digital. Revisão completa, pasta térmica nova.</p>
          <div class="p-card-price"><span class="price">629,00 €</span><span class="price-old">1 089,00 €</span></div>
          <div style="display:flex;gap:6px;margin-top:6px;flex-wrap:wrap"><span style="font-size:11px;background:#e6f7e6;color:#0a6b0a;padding:3px 6px;border-radius:3px">✓ 24 meses</span><span style="font-size:11px;background:#fff7e6;color:#8a5a00;padding:3px 6px;border-radius:3px">Micro-riscos</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="Lenovo A"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn-icon"><i class="fa fa-heart-o"></i></button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A+" data-warranty="24" data-price="479.90">
        <div class="p-card-img">
          <span class="badge badge-new2">-40%</span><span class="badge-grade grade-Aplus" style="top:36px">Grade A+</span>
          <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=400&auto=format&fit=crop&q=60" alt="HP">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • HP</div>
          <h3 class="p-card-title"><a href="#">HP EliteBook 840 G9 i5-1235U 8GB 256GB 14" FHD — Selado</a></h3>
          <div class="p-card-ref">RC-HP-840-A+ • 67 ciclos • 95% saúde • Como novo</div>
          <p class="p-card-desc">EliteBook premium, corpo alumínio, 1.32kg. Exposição, sem uso. Garantia Inforlândia + HP remanescente.</p>
          <div class="p-card-price"><span class="price">479,90 €</span><span class="price-old">799,00 €</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="HP A+"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn-icon"><i class="fa fa-heart-o"></i></button></div>
        </div>
      </div>

      <div class="p-card" data-grade="B" data-warranty="12" data-price="299.90">
        <div class="p-card-img">
          <span class="badge badge-new2">-35%</span><span class="badge-grade grade-B" style="top:36px">Grade B</span>
          <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=400&auto=format&fit=crop&q=60" alt="ASUS">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Desktop Recondicionado • ASUS</div>
          <h3 class="p-card-title"><a href="#">ASUS VivoPC i3-10100 8GB 512GB SSD — Desktop compacto</a></h3>
          <div class="p-card-ref">RC-ASUS-VIVOB • Desgaste leve • 342 ciclos • Funcional 100%</div>
          <p class="p-card-desc">Ideal para escritório/estudo. Revisão completa, SSD novo, Windows 11 Pro licenciado.</p>
          <div class="p-card-price"><span class="price">299,90 €</span><span class="price-old">459,00 €</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="ASUS B"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn-icon"><i class="fa fa-heart-o"></i></button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A" data-warranty="24" data-price="549.00">
        <div class="p-card-img">
          <span class="badge badge-new2">-30%</span><span class="badge-grade grade-A" style="top:36px">Grade A</span>
          <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&auto=format&fit=crop&q=60" alt="Apple">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • Apple</div>
          <h3 class="p-card-title"><a href="#">MacBook Air M1 8GB 256GB 13.3" — Grade A • Bateria 90%</a></h3>
          <div class="p-card-ref">RC-APL-M1-A • 110 ciclos • Ligeira marca base • Teclado PT</div>
          <p class="p-card-desc">M1 8-core, 18h bateria. Revisão Apple/Inforlândia, garantia 24 meses própria.</p>
          <div class="p-card-price"><span class="price">549,00 €</span><span class="price-old">1 199,00 €</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="MacBook"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn-icon"><i class="fa fa-heart-o"></i></button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A" data-warranty="24" data-price="399.90">
        <div class="p-card-img">
          <span class="badge badge-new2">-32%</span><span class="badge-grade grade-A" style="top:36px">Grade A</span>
          <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=400&auto=format&fit=crop&q=60" alt="Acer">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Workstation Recondicionada • Dell Precision</div>
          <h3 class="p-card-title"><a href="#">Dell Precision 5570 i7-12700H 32GB 1TB RTX A1000 — Workstation</a></h3>
          <div class="p-card-ref">RC-DELL-P5570-A • 95 ciclos • 92% saúde • ISV certificada</div>
          <p class="p-card-desc">Workstation móvel para CAD/3D. Ecrã 15.6" 4K, GPU profissional, 32GB DDR5.</p>
          <div class="p-card-price"><span class="price">399,90 €</span><span class="price-old">2 199,00 €</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="Precision"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn-icon"><i class="fa fa-heart-o"></i></button></div>
        </div>
      </div>
    </div>

    <div style="margin:18px 0;display:flex;gap:10px;justify-content:center">
      <button class="btn btn-outline">1</button><button class="btn btn-outline">2</button><button class="btn btn-outline">Seguinte <i class="fa fa-angle-right"></i></button>
    </div>

    <div style="border:1px solid var(--border);border-radius:6px;background:#fff;padding:14px;margin-top:10px">
      <h3 style="margin:0 0 8px;font-size:15px"><i class="fa fa-certificate" style="color:var(--red)"></i> O que é Grade A+ / A / B ?</h3>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;font-size:13px;line-height:1.5">
        <div><b style="color:#0a6b0a">Grade A+ — Como novo</b><br>Sem marcas visíveis, bateria >90%, embalagem neutra + carregador. Garantia 24 meses.</div>
        <div><b style="color:#0a3d8a">Grade A — Excelente</b><br>Micro-riscos apenas visíveis a <30cm, bateria >85%, funcional 100%.</div>
        <div><b style="color:#8a5a00">Grade B — Bom</b><br>Sinais leves de uso (teclado/base), bateria >75%, totalmente revisto. Mais barato.</div>
      </div>
      <p style="font-size:12px;color:#666;margin:10px 0 0">Todos passam por <b>checklist 30 pontos Inforlândia</b>: teste stress, ecrã, teclado, portas, bateria, SSD health, limpeza interna, pasta térmica, fotos reais.</p>
    </div>
  </div>
</div>
