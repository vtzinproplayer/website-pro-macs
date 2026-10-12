<?php // recondicionados.php — CATÁLOGO RECONDICIONADOS + AI ?>
<div class="breadcrumb">
  <div class="container">
    <a href="/"><i class="fa fa-home"></i> Início</a> <span style="margin:0 6px">/</span> <b>Catálogo Recondicionados</b> <span style="background:#1a9e1a;color:#fff;padding:2px 6px;border-radius:3px;font-size:11px;margin-left:8px">♻️ + ✨ AI</span>
  </div>
</div>

<div class="container">
  <div style="background:linear-gradient(135deg,#0f5e3a,#1a9e5e);color:#fff;border-radius:8px;padding:18px;margin:16px 0;display:flex;gap:16px;align-items:center;flex-wrap:wrap">
    <div style="font-size:42px">♻️</div>
    <div style="flex:1;min-width:280px">
      <h1 style="margin:0;font-family:Poppins,sans-serif;font-size:22px">Catálogo Recondicionados Certificados <span style="background:#111;color:#ffea00;padding:3px 8px;border-radius:4px;font-size:11px;vertical-align:middle">✨ ligado à AI</span></h1>
      <p style="margin:4px 0 0;opacity:.95;font-size:13.5px">Fotos reais • Bateria testada • 12-24 meses • Até -45% • <b>Agora com Assistente AI:</b> diga “quero o melhor até 600€” e a AI filtra por si, mesmo que não perceba nada.</p>
    </div>
    <div style="background:#fff;color:#0f5e3a;border-radius:6px;padding:10px 14px;text-align:center;min-width:160px">
      <div style="font-size:28px;font-weight:800;line-height:1">47</div><div style="font-size:12px;font-weight:700">EQUIPAMENTOS<br>DISPONÍVEIS</div>
    </div>
  </div>

  <!-- Barra AI -->
  <div id="aiBar" style="border:2px solid #111;border-radius:8px;background:#fff;padding:12px;display:flex;gap:12px;align-items:center;flex-wrap:wrap">
    <div style="width:38px;height:38px;background:var(--red);color:#fff;border-radius:8px;display:flex;align-items:center;justify-content:center"><i class="fa fa-magic"></i></div>
    <div style="flex:1;min-width:240px">
      <b style="font-size:13px">✨ Pergunte à AI — ela filtra este catálogo por si</b><br>
      <span style="font-size:12px;color:#555">Experimente: “PC leve para faculdade até 500€” • “gaming barato recondicionado” • “não percebo, escolhe tu o melhor”</span>
    </div>
    <form id="aiCatalogForm" style="display:flex;gap:8px;flex:1;max-width:520px;min-width:260px">
      <input id="aiCatalogInput" type="text" placeholder="Ex: gaming até 650€, não percebo nada..." style="flex:1;border:1px solid var(--border);border-radius:6px;padding:10px;font-size:13px">
      <button type="submit" class="btn btn-red" style="white-space:nowrap">Perguntar à AI <i class="fa fa-paper-plane"></i></button>
    </form>
    <a href="/assistente-ai" style="font-size:12px;color:var(--red);font-weight:700;white-space:nowrap">Abrir assistente completo →</a>
  </div>
  <div id="aiCatalogAnswer" style="margin-top:8px;display:none"></div>
  <div id="aiChips" style="margin-top:8px;display:flex;gap:8px;flex-wrap:wrap">
    <button class="chip ai-chip" data-aiq="gaming barato até 600">🎮 AI: gaming barato</button>
    <button class="chip ai-chip" data-aiq="universidade leve até 500">🎓 AI: universidade até 500€</button>
    <button class="chip ai-chip" data-aiq="escritorio silencioso até 400">💼 AI: escritório até 400€</button>
    <button class="chip ai-chip" data-aiq="melhor custo beneficio indiferente">✨ AI: melhor custo/benefício</button>
    <button class="chip" onclick="document.getElementById('aiCatalogAnswer').style.display='none'; document.querySelectorAll('.p-card').forEach(c=>c.style.display=''); document.getElementById('filterCount').textContent='6 produtos'" style="background:#111;color:#fff">Limpar filtro AI</button>
  </div>
</div>

<div class="container layout-with-sidebar">
  <aside class="filters">
    <h3>FILTRAR POR <span id="filterCount" style="background:var(--red);color:#fff;padding:2px 7px;border-radius:10px;font-size:11px">6 produtos</span></h3>
    <div class="filter-group">
      <h4>Grade (Estado Estético)</h4>
      <label><input type="checkbox" data-filter-grade value="A+"> Grade A+ — Como novo</label>
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
    </div>
    <div class="filter-group">
      <h4>Preço</h4>
      <input type="range" id="priceRange" min="200" max="1200" value="1200" class="filter-range">
      <div style="display:flex;justify-content:space-between;font-size:12px;color:#555;margin-top:4px"><span>200 €</span><b id="priceRangeVal">1200 €</b></div>
    </div>
    <div class="filter-group" style="background:#111;color:#fff;border-radius:6px;margin:10px">
      <h4 style="color:#ffea00"><i class="fa fa-magic"></i> Dica da AI</h4>
      <p style="font-size:12px;margin:6px 0 0;line-height:1.4">Inexperiente? Escreva à AI em cima em linguagem natural. Ela explica <b>sem jargão</b> porque escolheu cada um e se vale a pena novo vs recondicionado.</p>
      <a href="/assistente-ai" class="btn btn-red" style="width:100%;margin-top:8px;justify-content:center;font-size:12px">Falar com a AI</a>
    </div>
    <div style="padding:12px">
      <button onclick="document.querySelectorAll('[data-filter-grade],[data-filter-warranty]').forEach(c=>c.checked=false);document.getElementById('priceRange').value=1200;document.querySelectorAll('.p-card').forEach(c=>c.style.display='');document.getElementById('filterCount').textContent='6 produtos';document.getElementById('aiCatalogAnswer').style.display='none'" style="width:100%;border:1px solid var(--border);background:#fff;padding:8px;border-radius:4px;font-size:12px;cursor:pointer">Limpar filtros</button>
    </div>
  </aside>

  <div>
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;gap:12px;flex-wrap:wrap">
      <div style="font-size:13px;color:#555"><b>6</b> produtos • Ordenar por:
        <select style="border:1px solid var(--border);border-radius:4px;padding:6px;margin-left:6px">
          <option>Relevância + AI</option><option>Preço: menor primeiro</option><option>Preço: maior primeiro</option><option>Grade: A+ primeiro</option>
        </select>
      </div>
      <div style="font-size:12px;color:#888"><i class="fa fa-magic" style="color:var(--red)"></i> Produtos com selo <b>✨ AI recomenda</b> são os melhores para si</div>
    </div>

    <div class="products-grid" id="recondGrid">
      <div class="p-card" data-grade="A+" data-warranty="24" data-price="549.90" data-uso="universidade,escritorio" data-ai="universidade leve">
        <div class="p-card-img">
          <span class="badge badge-new2">-38%</span><span class="badge-grade grade-Aplus" style="top:36px">Grade A+</span>
          <span class="ai-badge" style="position:absolute;bottom:8px;left:8px;background:#111;color:#ffea00;font-size:10px;padding:3px 7px;border-radius:10px;display:none"><i class="fa fa-magic"></i> ✨ AI recomenda para si</span>
          <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&auto=format&fit=crop&q=60" alt="Dell">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • Dell • ♻️ 312kg CO₂</div>
          <h3 class="p-card-title"><a href="#">Dell Latitude 5540 i5-1345U 16GB 512GB NVMe 15.6" FHD — Como novo</a></h3>
          <div class="p-card-ref">RC-DELL-5540-A+ • 42 ciclos • 97% saúde • Sem marcas</div>
          <p class="p-card-desc">Para <b>universidade/escritório</b>: leve, bateria 14h, teclado PT. AI diz: “óptimo para quem quer levar na mochila e não quer gastar muito”.</p>
          <div class="p-card-price"><span class="price">549,90 €</span><span class="price-old">889,00 €</span></div>
          <div class="ai-explain" style="display:none;background:#f9f9f9;border:1px solid #eee;border-radius:4px;padding:7px;margin-top:6px;font-size:11.5px;line-height:1.4"><b>🤖 AI explica:</b> Este é o “cérebro” (processador) rápido para Excel/Zoom e 16GB de memória para ter muitas janelas abertas sem lentidão.</div>
          <div style="display:flex;gap:6px;margin-top:6px;flex-wrap:wrap"><span style="font-size:11px;background:#e6f7e6;color:#0a6b0a;padding:3px 6px;border-radius:3px">✓ 24 meses</span><span style="font-size:11px;background:#fff7e6;color:#8a5a00;padding:3px 6px;border-radius:3px">Fotos reais</span></div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="Dell A+"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn btn-outline" style="font-size:11px;padding:6px 8px" onclick="this.closest('.p-card').querySelector('.ai-explain').style.display=this.closest('.p-card').querySelector('.ai-explain').style.display==='none'?'block':'none'"><i class="fa fa-magic"></i> Porquê este?</button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A" data-warranty="24" data-price="629.00" data-uso="escritorio,programacao" data-ai="programacao">
        <div class="p-card-img">
          <span class="badge badge-new2">-42%</span><span class="badge-grade grade-A" style="top:36px">Grade A</span>
          <span class="ai-badge" style="position:absolute;bottom:8px;left:8px;background:#111;color:#ffea00;font-size:10px;padding:3px 7px;border-radius:10px;display:none"><i class="fa fa-magic"></i> ✨ AI recomenda</span>
          <img src="https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=400&auto=format&fit=crop&q=60" alt="Lenovo">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • Lenovo</div>
          <h3 class="p-card-title"><a href="#">Lenovo ThinkPad T14s Gen3 i7-1260P 16GB 1TB 14" WUXGA</a></h3>
          <div class="p-card-ref">RC-LEN-T14S-A • 128 ciclos • 89% • Micro-riscos tampa</div>
          <p class="p-card-desc">ThinkPad para <b>prog./trabalho</b>. AI: “Teclado dos melhores, 1TB para muitos ficheiros, bateria 89% ainda excelente”.</p>
          <div class="p-card-price"><span class="price">629,00 €</span><span class="price-old">1 089,00 €</span></div>
          <div class="ai-explain" style="display:none;background:#f9f9f9;border:1px solid #eee;border-radius:4px;padding:7px;margin-top:6px;font-size:11.5px"><b>🤖 AI:</b> i7 é mais potente que i5 — nota-se se compilar código ou editar fotos. 1TB é muito espaço.</div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="Lenovo"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn btn-outline" style="font-size:11px;padding:6px 8px" onclick="this.closest('.p-card').querySelector('.ai-explain').style.display=this.closest('.p-card').querySelector('.ai-explain').style.display==='none'?'block':'none'"><i class="fa fa-magic"></i> Porquê?</button></div>
        </div>
      </div>

      <div class="p-card" data-grade="B" data-warranty="12" data-price="299.90" data-uso="escritorio" data-ai="escritorio barato">
        <div class="p-card-img">
          <span class="badge badge-new2">-35%</span><span class="badge-grade grade-B" style="top:36px">Grade B</span>
          <span class="ai-badge" style="position:absolute;bottom:8px;left:8px;background:#111;color:#ffea00;font-size:10px;padding:3px 7px;border-radius:10px;display:none"><i class="fa fa-magic"></i> ✨ AI recomenda</span>
          <img src="https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=400&auto=format&fit=crop&q=60" alt="ASUS">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Desktop Recondicionado • ASUS</div>
          <h3 class="p-card-title"><a href="#">ASUS VivoPC i3-10100 8GB 512GB SSD — Desktop compacto</a></h3>
          <div class="p-card-ref">RC-ASUS-VIVOB • Desgaste leve • 342 ciclos</div>
          <p class="p-card-desc">Para <b>escritório em casa</b>. AI: “Barato, silencioso, chega para Excel/YouTube. Não é para jogos pesados”.</p>
          <div class="p-card-price"><span class="price">299,90 €</span><span class="price-old">459,00 €</span></div>
          <div class="ai-explain" style="display:none;background:#f9f9f9;border:1px solid #eee;border-radius:4px;padding:7px;margin-top:6px;font-size:11.5px"><b>🤖 AI:</b> i3 é a gama simples — suficiente para casa, mas se quiser jogar, veja o HP Omen recond. por 649€.</div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="ASUS"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn btn-outline" style="font-size:11px;padding:6px 8px" onclick="this.closest('.p-card').querySelector('.ai-explain').style.display=this.closest('.p-card').querySelector('.ai-explain').style.display==='none'?'block':'none'"><i class="fa fa-magic"></i> Porquê?</button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A+" data-warranty="24" data-price="479.90" data-uso="universidade" data-ai="universidade leve">
        <div class="p-card-img">
          <span class="badge badge-new2">-40%</span><span class="badge-grade grade-Aplus" style="top:36px">Grade A+</span>
          <span class="ai-badge" style="position:absolute;bottom:8px;left:8px;background:#111;color:#ffea00;font-size:10px;padding:3px 7px;border-radius:10px;display:none"><i class="fa fa-magic"></i> ✨ AI recomenda</span>
          <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=400&auto=format&fit=crop&q=60" alt="HP">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • HP</div>
          <h3 class="p-card-title"><a href="#">HP EliteBook 840 G9 i5-1235U 8GB 256GB 14" FHD — Selado</a></h3>
          <div class="p-card-ref">RC-HP-840-A+ • 67 ciclos • 95% saúde</div>
          <p class="p-card-desc">14" leve 1.32kg. AI: “Ideal para levar todos os dias, bateria dura um dia inteiro”.</p>
          <div class="p-card-price"><span class="price">479,90 €</span><span class="price-old">799,00 €</span></div>
          <div class="ai-explain" style="display:none;background:#f9f9f9;border:1px solid #eee;border-radius:4px;padding:7px;margin-top:6px;font-size:11.5px"><b>🤖 AI:</b> 14" é o equilíbrio entre ver bem e ser leve. 8GB chega para estudar.</div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="HP"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn btn-outline" style="font-size:11px;padding:6px 8px" onclick="this.closest('.p-card').querySelector('.ai-explain').style.display=this.closest('.p-card').querySelector('.ai-explain').style.display==='none'?'block':'none'"><i class="fa fa-magic"></i> Porquê?</button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A+" data-warranty="24" data-price="649.00" data-uso="gaming" data-ai="gaming barato">
        <div class="p-card-img">
          <span class="badge badge-new2">-36%</span><span class="badge-grade grade-Aplus" style="top:36px">Grade A+</span>
          <span class="ai-badge" style="position:absolute;bottom:8px;left:8px;background:#111;color:#ffea00;font-size:10px;padding:3px 7px;border-radius:10px;display:none"><i class="fa fa-magic"></i> ✨ AI recomenda</span>
          <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?w=400&auto=format&fit=crop&q=60" alt="Gaming">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Desktop Gaming Recondicionado • HP Omen</div>
          <h3 class="p-card-title"><a href="#">HP Omen i5-12400F RTX 3060 16GB 512GB — Gaming Grade A+</a></h3>
          <div class="p-card-ref">RC-OMEN-A+ • 85 ciclos • 92% • Como novo</div>
          <p class="p-card-desc">Gaming 1080p 144Hz. AI: “Para Fortnite/Valorant ultra, poupa 400€ vs novo, mesmos 16GB e RTX 3060”.</p>
          <div class="p-card-price"><span class="price">649,00 €</span><span class="price-old">1 049,00 €</span></div>
          <div class="ai-explain" style="display:none;background:#f9f9f9;border:1px solid #eee;border-radius:4px;padding:7px;margin-top:6px;font-size:11.5px"><b>🤖 AI:</b> RTX 3060 é placa para jogos. 16GB é o padrão hoje. Este recond. tem performance igual a novo por menos 400€.</div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="Omen"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn btn-outline" style="font-size:11px;padding:6px 8px" onclick="this.closest('.p-card').querySelector('.ai-explain').style.display=this.closest('.p-card').querySelector('.ai-explain').style.display==='none'?'block':'none'"><i class="fa fa-magic"></i> Porquê?</button></div>
        </div>
      </div>

      <div class="p-card" data-grade="A" data-warranty="24" data-price="549.00" data-uso="naosei" data-ai="melhor custo beneficio">
        <div class="p-card-img">
          <span class="badge badge-new2">-45%</span><span class="badge-grade grade-A" style="top:36px">Grade A</span>
          <span class="ai-badge" style="position:absolute;bottom:8px;left:8px;background:#111;color:#ffea00;font-size:10px;padding:3px 7px;border-radius:10px;display:none"><i class="fa fa-magic"></i> ✨ AI recomenda</span>
          <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=400&auto=format&fit=crop&q=60" alt="Apple">
        </div>
        <div class="p-card-body">
          <div class="p-card-cat">Portátil Recondicionado • Apple</div>
          <h3 class="p-card-title"><a href="#">MacBook Air M1 8GB 256GB 13.3" — Grade A • 90%</a></h3>
          <div class="p-card-ref">RC-APL-M1-A • 110 ciclos • Ligeira marca base</div>
          <p class="p-card-desc">18h bateria. AI: “Se é para faculdade/design e quer bateria eterna, este é o rei — poupa 650€”.</p>
          <div class="p-card-price"><span class="price">549,00 €</span><span class="price-old">1 199,00 €</span></div>
          <div class="ai-explain" style="display:none;background:#f9f9f9;border:1px solid #eee;border-radius:4px;padding:7px;margin-top:6px;font-size:11.5px"><b>🤖 AI:</b> M1 da Apple é muito eficiente — bateria dura o dobro de um Windows normal.</div>
          <div class="p-card-actions"><button class="btn-cart" data-add-cart="MacBook"><i class="fa fa-shopping-cart"></i> Adicionar</button><button class="btn btn-outline" style="font-size:11px;padding:6px 8px" onclick="this.closest('.p-card').querySelector('.ai-explain').style.display=this.closest('.p-card').querySelector('.ai-explain').style.display==='none'?'block':'none'"><i class="fa fa-magic"></i> Porquê?</button></div>
        </div>
      </div>
    </div>

    <div style="margin-top:14px;border:1px solid var(--border);border-radius:6px;background:#fff;padding:14px">
      <h3 style="margin:0 0 8px;font-size:15px"><i class="fa fa-certificate" style="color:var(--red)"></i> O que é Grade A+ / A / B ? <span style="font-weight:400;color:#888">— explicado pela AI sem jargão</span></h3>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;font-size:13px;line-height:1.5">
        <div><b style="color:#0a6b0a">Grade A+ — Como novo</b><br>Sem marcas, bateria >90%, “parece que nunca foi usado”. 24 meses.</div>
        <div><b style="color:#0a3d8a">Grade A — Excelente</b><br>Micro-riscos só vistos de perto (<30cm), bateria >85%.</div>
        <div><b style="color:#8a5a00">Grade B — Bom e barato</b><br>Sinais leves de uso, mas tudo testado 30 pontos Inforlândia.</div>
      </div>
      <p style="font-size:12px;color:#666;margin:10px 0 0"><i class="fa fa-magic" style="color:var(--red)"></i> Dica AI: “Se é o seu 1º recondicionado e quer sem risco, vá de A+. Se quer poupar ao máximo, B é ótimo e fica barato.”</p>
    </div>
  </div>
</div>
