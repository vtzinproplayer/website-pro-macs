// Elite Digital — app.js v3 AI
document.addEventListener('DOMContentLoaded', ()=>{
  const slides = document.querySelectorAll('.slider img');
  let idx=0;
  if(slides.length>1){
    setInterval(()=>{
      slides.forEach((s,i)=> s.style.display = i===idx ? 'block':'none');
      idx=(idx+1)%slides.length;
    }, 4000);
  }

  // AI Assistant
  if(document.getElementById('ai-root')){
    initAI();
  }
  // Recondicionados AI catalog
  if(document.getElementById('aiCatalogForm')){
    initRecondAI();
  }

  // filtros recond antigos + cart
  const cards = document.querySelectorAll('[data-grade]');
  document.querySelectorAll('[data-filter-grade]').forEach(cb=>{
    cb.addEventListener('change', applyFilters);
  });
  document.querySelectorAll('[data-filter-warranty]').forEach(cb=>{
    cb.addEventListener('change', applyFilters);
  });
  const priceRange = document.getElementById('priceRange');
  if(priceRange){
    priceRange.addEventListener('input', applyFilters);
  }
  function applyFilters(){
    const activeGrades = [...document.querySelectorAll('[data-filter-grade]:checked')].map(c=>c.value);
    const activeWarranty = [...document.querySelectorAll('[data-filter-warranty]:checked')].map(c=>c.value);
    const maxPrice = priceRange ? parseInt(priceRange.value,10) : 9999;
    const valEl = document.getElementById('priceRangeVal');
    if(valEl) valEl.textContent = maxPrice + ' €';
    let visible=0;
    cards.forEach(card=>{
      if(card.style.display==='none' && card.dataset.aiFiltered==='true') return; // keep AI filter
      const grade = card.dataset.grade;
      const warranty = card.dataset.warranty;
      const price = parseFloat(card.dataset.price);
      const okGrade = activeGrades.length===0 || activeGrades.includes(grade);
      const okWar = activeWarranty.length===0 || activeWarranty.includes(warranty);
      const okPrice = price <= maxPrice;
      const show = okGrade && okWar && okPrice;
      // don't override AI hidden
      if(card.dataset.aiFiltered==='true' && !show) { /* keep hidden */ } else {
        card.style.display = show ? '' : 'none';
      }
      if(show && card.style.display!=='none') visible++;
    });
    const n = document.getElementById('filterCount');
    if(n) n.textContent = visible + ' produtos';
  }

  document.querySelectorAll('[data-add-cart]').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      e.preventDefault();
      btn.textContent='✓ Adicionado';
      btn.style.background='#1a9e1a';
      btn.style.color='#fff';
      setTimeout(()=>{ btn.innerHTML='<i class="fa fa-shopping-cart"></i> Adicionar'; btn.style.background=''; btn.style.color=''; },1500);
      const el = document.querySelector('.cart-count');
      if(el) el.textContent = parseInt(el.textContent||'0',10)+1;
    });
  });
});

function initAI(){
  const log = document.getElementById('chatLog');
  const input = document.getElementById('chatInput');
  const form = document.getElementById('chatForm');
  const chips = document.getElementById('chips');
  const orcRange = document.getElementById('orcRange');
  const orcVal = document.getElementById('orcVal');
  const btnGerar = document.getElementById('btnGerar');
  let uso = null, exp='inexperiente', pref='indiferente';

  if(orcRange && orcVal){
    orcRange.addEventListener('input', ()=> orcVal.textContent = orcRange.value + ' €');
  }
  document.querySelectorAll('[data-uso]').forEach(b=>{
    b.addEventListener('click', ()=>{
      document.querySelectorAll('[data-uso]').forEach(x=>x.classList.remove('active'));
      b.classList.add('active');
      uso=b.dataset.uso;
    });
  });
  document.querySelectorAll('[data-exp]').forEach(b=>{
    b.addEventListener('click', ()=>{
      document.querySelectorAll('[data-exp]').forEach(x=>x.classList.remove('active'));
      b.classList.add('active'); exp=b.dataset.exp;
    });
  });
  document.querySelectorAll('[data-pref]').forEach(b=>{
    b.addEventListener('click', ()=>{
      document.querySelectorAll('[data-pref]').forEach(x=>x.classList.remove('active'));
      b.classList.add('active'); pref=b.dataset.pref;
    });
  });

  function addMsg(text, who='ai'){
    const div=document.createElement('div');
    div.className='msg '+who;
    div.innerHTML= who==='ai'
      ? `<img src="https://i.pravatar.cc/100?img=15" alt="AI"><div class="bubble">${text}</div>`
      : `<div class="bubble">${text}</div><img src="https://i.pravatar.cc/100?img=32" alt="Você">`;
    log.appendChild(div);
    log.scrollTop=log.scrollHeight;
  }
  function typing(on=true){
    let el=document.getElementById('typing');
    if(on){
      if(el) return;
      el=document.createElement('div');
      el.id='typing';
      el.className='typing';
      el.innerHTML='<i class="fa fa-circle" style="font-size:6px"></i><i class="fa fa-circle" style="font-size:6px;animation-delay:.15s"></i><i class="fa fa-circle" style="font-size:6px;animation-delay:.3s"></i> AI a escrever...';
      log.parentElement.appendChild(el);
      log.scrollTop=log.scrollHeight;
    } else { el?.remove(); }
  }

  function gerarRecomendacao(context){
    const orc = parseInt(document.getElementById('orcRange')?.value||'700',10);
    const usoSel = uso || context?.uso || 'naosei';
    // rule-based AI
    let rec;
    let explicacao='';
    const inexperiente = exp==='inexperiente';
    if(usoSel==='gaming'){
      if(orc < 600){
        rec={tipo:'recondicionado', titulo:'HP Omen i5-12400F + RTX 3060 — Grade A+', preco:'649 €', img:'https://images.unsplash.com/photo-1591488320449-011701bb6704?w=300&auto=format&fit=crop&q=60', desc:'Gaming 1080p 144Hz para Fortnite/Valorant ultra. Poupa 400€ vs novo.'};
        explicacao= inexperiente
          ? 'A <b>placa gráfica RTX 3060</b> é a peça que desenha os jogos. 16GB de RAM é a “memória rápida” para não engasgar. Este recondicionado é como novo (Grade A+) mas muito mais barato — ideal para começar.'
          : 'RTX 3060 12GB + i5-12400F, 16GB DDR4, NVMe 512GB. Melhor fps/€ até 650€. Montagem e testes incluídos.';
      } else if(orc < 1000){
        rec={tipo:'novo', titulo:'Build Nova: i5-13400F + RTX 4060 8GB + 16GB DDR4', preco:'849 €', img:'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=300&auto=format&fit=crop&q=60', desc:'Montagem nova, garantia 3 anos sistema, DLSS 3 para +fps.'};
        explicacao= inexperiente
          ? 'Esta build nova é “sem sustos”: peças novas com garantia total 3 anos. A RTX 4060 é mais recente que a 3060 e consome menos.'
          : 'i5-13400F + RTX 4060, ideal 1080p/1440p, 16GB, 1TB NVMe, PSU 650W Gold.';
      } else {
        rec={tipo:'novo', titulo:'Build Pro: R7 7800X3D + RTX 4070 SUPER 12GB', preco:'1.429 €', img:'https://images.unsplash.com/photo-1591488320449-011701bb6704?w=300&auto=format&fit=crop&q=60', desc:'1440p/4K ultra, 32GB DDR5 6000, 2TB NVMe, AIO 240mm.'};
        explicacao='Topo para gaming + streaming: 7800X3D é o rei dos jogos, 32GB DDR5 para futuro.';
      }
    } else if(usoSel==='universidade'){
      rec={tipo:'recondicionado', titulo:'Lenovo ThinkPad T14s i7-1260P 16GB 1TB — Grade A', preco:'629 €', img:'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=300&auto=format&fit=crop&q=60', desc:'14" leve 1.2kg, bateria 14h, teclado dos melhores para escrever muito.'};
      explicacao= inexperiente ? '14" é o tamanho ideal para levar na mochila. 16GB mantém 20 separadores Chrome sem lentidão.' : 'i7-1260P eficiente, 1TB NVMe, 16GB.';
    } else if(usoSel==='escritorio'){
      if(orc<400){
        rec={tipo:'recondicionado', titulo:'ASUS VivoPC i3 compacto — Grade B', preco:'299 €', img:'https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=300&auto=format&fit=crop&q=60', desc:'Silencioso, pequeno, chega para Excel/Zoom/YouTube.'};
        explicacao='Barato e silencioso. Não é para jogos, mas para escritório é perfeito e poupa muito.';
      } else {
        rec={tipo:'recondicionado', titulo:'Dell Latitude 5540 i5-1345U 16GB 512GB — A+', preco:'549 €', img:'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&auto=format&fit=crop&q=60', desc:'15.6" FHD, 16GB, 512GB — rápido e com garantia 24m.'};
        explicacao='i5 recente + 16GB = rapidez para tudo do dia a dia, sem pagar preço de novo.';
      }
    } else {
      // geral
      rec={tipo:'recondicionado', titulo:'Dell Latitude 5540 — Melhor custo/benefício AI', preco:'549 €', img:'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&auto=format&fit=crop&q=60', desc:'Uso geral: rápido, leve, bateria 10h, 24 meses garantia.'};
      explicacao='Equilíbrio entre preço e performance para quem quer “algo que funcione bem” sem complicar.';
    }

    // pref recondicionado/novo
    if(pref==='recondicionado' && rec.tipo==='novo'){
      // força alternativa recond
      rec={tipo:'recondicionado', titulo:'HP Omen Recond. RTX 3060 — Grade A+ (alternativa sustentável)', preco:'649 €', img:rec.img, desc:'Mesma performance gaming por menos 200€, poupa 312kg CO₂.'};
    }
    if(pref==='novo' && rec.tipo==='recondicionado'){
      rec.tipo='novo';
      rec.titulo=rec.titulo.replace('Recondicionado','Novo INSYS');
      rec.preco='799 €';
    }

    renderResult(rec, explicacao, usoSel, orc, inexperiente);
  }

  function renderResult(rec, explicacao, uso, orc, inexp){
    const box=document.getElementById('aiResult');
    box.classList.remove('empty');
    box.innerHTML=`
      <div class="rec-card">
        <div class="rec-head"><h4><i class="fa fa-magic"></i> ✨ Recomendação AI para si</h4><span style="background:#ffea00;color:#111;padding:3px 8px;border-radius:4px;font-size:11px;font-weight:700">${rec.tipo==='recondicionado'?'♻️ RECONDICIONADO':'✨ NOVO'}</span></div>
        <div class="rec-body">
          <div style="display:flex;gap:14px">
            <img src="${rec.img}" alt="${rec.titulo}" style="width:120px;height:120px;object-fit:contain;border:1px solid var(--border);border-radius:6px;background:#fff;padding:6px">
            <div style="flex:1">
              <h3 style="margin:0 0 4px;font-size:15px">${rec.titulo}</h3>
              <p style="margin:0;color:#555;font-size:12.5px">${rec.desc}</p>
              <div style="margin-top:8px;display:flex;gap:8px;flex-wrap:wrap"><span style="background:#e6f7e6;color:#0a6b0a;padding:3px 7px;border-radius:4px;font-size:11px"><i class="fa fa-check"></i> Compatível garantido</span><span style="background:#e6f0ff;color:#0a3d8a;padding:3px 7px;border-radius:4px;font-size:11px"><i class="fa fa-wrench"></i> Montagem grátis</span><span style="background:#fff7e6;color:#8a5a00;padding:3px 7px;border-radius:4px;font-size:11px">Para ${uso} • até ${orc}€</span></div>
              <div class="rec-price" style="margin-top:8px">${rec.preco} <span style="font-size:12px;color:#888;font-weight:400">+ portes grátis >75€ • 24m garantia</span></div>
            </div>
          </div>
          <div class="explain"><b>🤖 AI explica ${inexp?'sem jargão':''}:</b> ${explicacao} ${rec.tipo==='recondicionado'?'<br><br><b>💡 Porquê recondicionado?</b> Mesmo desempenho por muito menos, com fotos reais, bateria testada e 24 meses garantia Inforlândia. Poupa ~285kg CO₂.':''}</div>
          <div style="display:flex;gap:8px;margin-top:10px;flex-wrap:wrap">
            <button class="btn btn-red" style="flex:1;justify-content:center" onclick="alert('Adicionado ao carrinho! (demo) — Redirecionaria para checkout PrestaShop')"><i class="fa fa-shopping-cart"></i> Quero este — Adicionar</button>
            <button class="btn btn-outline" style="flex:1;justify-content:center" onclick="window.location='/recondicionados'"><i class="fa fa-eye"></i> Ver no catálogo ♻️</button>
          </div>
          <details style="margin-top:8px;font-size:12px"><summary style="cursor:pointer;color:var(--red);font-weight:700">Ver comparação novo vs recondicionado</summary><p style="margin:6px 0 0;color:#555">Novo equivalente: ~1.049€ (mesmas specs). Este recondicionado: ${rec.preco} — <b>poupa ~400€</b> com mesma performance e garantia 24m. Se preferir novo, a AI monta build nova com peças atuais.</p></details>
        </div>
      </div>
    `;
    // mini builder simplificado
    const mb=document.getElementById('miniBuilder');
    if(mb){
      mb.style.display='block';
      mb.querySelector('#mbList').innerHTML=`
        <div class="mb-row"><img src="https://images.unsplash.com/photo-1555617117-2412cc290a4a?w=100&auto=format&fit=crop&q=60"><div><b>Quer ajustar?</b><br><small style="color:#888">Diga “mete mais RAM” ou “tira RGB” e a AI recalcula.</small></div><button class="btn btn-outline" style="font-size:11px;padding:4px 8px" onclick="document.getElementById('chatInput').value='Quero com mais RAM'; document.getElementById('chatInput').focus()">Pedir ajuste</button></div>
        <div class="mb-row"><img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=100&auto=format&fit=crop&q=60"><div><b>Montagem incluída</b><br><small style="color:#888">Mesmo sem experiência, recebe pronto a usar, drivers e testes 24h.</small></div><span style="color:#1a9e1a;font-weight:700;font-size:12px">✓ Incluído</span></div>
      `;
    }
    box.scrollIntoView({behavior:'smooth', block:'start'});
  }

  // chat submit
  form?.addEventListener('submit', (e)=>{
    e.preventDefault();
    const q=input.value.trim();
    if(!q) return;
    addMsg(q,'user');
    input.value='';
    typing(true);
    setTimeout(()=>{
      typing(false);
      // simple intent parse
      let usoDet=null;
      const lower=q.toLowerCase();
      if(lower.includes('gaming')||lower.includes('jogar')||lower.includes('fortnite')||lower.includes('valorant')) usoDet='gaming';
      else if(lower.includes('universidade')||lower.includes('faculdade')||lower.includes('estudo')||lower.includes('escola')) usoDet='universidade';
      else if(lower.includes('escritorio')||lower.includes('excel')||lower.includes('office')) usoDet='escritorio';
      else if(lower.includes('editar')||lower.includes('video')||lower.includes('design')) usoDet='edicao';
      else if(lower.includes('programa')) usoDet='programacao';
      else usoDet='naosei';
      if(usoDet!=='naosei'){
        uso=usoDet;
        document.querySelectorAll('[data-uso]').forEach(b=> b.classList.toggle('active', b.dataset.uso===uso));
      }
      // orçamento detect
      const m=q.match(/(\d{3,4})\s*€/);
      if(m){
        const v=parseInt(m[1],10);
        if(v>=300 && v<=2000){ const r=document.getElementById('orcRange'); if(r){ r.value=v; document.getElementById('orcVal').textContent=v+' €'; } }
      }
      const orc=parseInt(document.getElementById('orcRange')?.value||700,10);
      addMsg(`Percebi: <b>${usoDet==='naosei'?'uso geral':usoDet}</b> até <b>${orc}€</b>. Já estou a filtrar o catálogo ♻️ e a montar a melhor opção para si, explicando tudo simples...`,'ai');
      setTimeout(()=> gerarRecomendacao({uso:usoDet}), 700);
    }, 900);
  });

  chips?.querySelectorAll('.chip').forEach(c=>{
    c.addEventListener('click', ()=>{
      input.value=c.dataset.q;
      form.dispatchEvent(new Event('submit'));
    });
  });

  btnGerar?.addEventListener('click', ()=>{
    if(!uso){
      addMsg('Para recomendar bem, escolha acima <b>para que vai usar</b> (ex: Gaming, Universidade). Depois clique Gerar novamente 😊','ai');
      document.getElementById('optUso')?.scrollIntoView({behavior:'smooth'});
      return;
    }
    addMsg(`A gerar recomendação para <b>${uso}</b> até <b>${document.getElementById('orcRange').value}€</b> — modo <b>${exp==='inexperiente'?'explicação simples':exp}</b>...`,'user');
    typing(true);
    setTimeout(()=>{ typing(false); gerarRecomendacao(); }, 800);
  });

  // se vier com ?pergunta=
  const params=new URLSearchParams(location.search);
  const pq=params.get('pergunta');
  if(pq){
    input.value=pq;
    setTimeout(()=> form.dispatchEvent(new Event('submit')), 400);
  }
}

function initRecondAI(){
  const form=document.getElementById('aiCatalogForm');
  const input=document.getElementById('aiCatalogInput');
  const answer=document.getElementById('aiCatalogAnswer');
  const cards=[...document.querySelectorAll('.p-card')];

  function filterAI(query){
    const q=query.toLowerCase();
    let keep=[];
    if(q.includes('gaming')||q.includes('jogar')||q.includes('omen')||q.includes('rtx')){
      keep=['gaming'];
    } else if(q.includes('universidade')||q.includes('faculdade')||q.includes('estudo')||q.includes('leve')){
      keep=['universidade'];
    } else if(q.includes('escritorio')||q.includes('excel')||q.includes('office')){
      keep=['escritorio'];
    } else if(q.includes('barato')||q.includes('300')||q.includes('400')){
      keep=['escritorio','universidade'];
    } else if(q.includes('custo')||q.includes('melhor')){
      // mostrar todos mas destacar 2
      keep=['universidade','gaming'];
    } else {
      keep=['gaming','universidade','escritorio'];
    }

    let visible=0;
    cards.forEach(c=>{
      const uso=c.dataset.uso||'';
      const ai=c.dataset.ai||'';
      const match = keep.some(k=> uso.includes(k) || ai.includes(k) || q.includes(k));
      // also price filter if query has €
      const m=q.match(/(\d{3,4})/);
      let priceOk=true;
      if(m){
        const v=parseInt(m[1],10);
        const p=parseFloat(c.dataset.price);
        priceOk = p <= v+100; // margem
      }
      const show = match && priceOk;
      c.style.display = show ? '' : 'none';
      c.dataset.aiFiltered = show ? 'false' : 'true';
      const badge=c.querySelector('.ai-badge');
      const explain=c.querySelector('.ai-explain');
      if(badge) badge.style.display = show ? 'block' : 'none';
      if(show) visible++;
    });
    document.getElementById('filterCount').textContent = visible + ' produtos';
    return {keep, visible};
  }

  form.addEventListener('submit', (e)=>{
    e.preventDefault();
    const q=input.value.trim();
    if(!q) return;
    answer.style.display='block';
    answer.innerHTML=`<div style="background:#111;color:#fff;border-radius:6px;padding:10px 12px;display:flex;gap:10px;align-items:center"><i class="fa fa-magic" style="color:#ffea00"></i><div><b>AI Elite:</b> a filtrar por “${q}”... <span style="opacity:.8">a mostrar só o que faz sentido para si, explicando sem jargão.</span></div><span style="margin-left:auto;font-size:11px;background:#ffea00;color:#111;padding:3px 8px;border-radius:4px">♻️ catálogo ao vivo</span></div>`;
    const res=filterAI(q);
    setTimeout(()=>{
      answer.innerHTML+=`<div style="background:#e6f7e6;border:1px solid #a3d9a3;border-radius:6px;padding:10px;margin-top:8px;font-size:13px"><b>✨ AI encontrou ${res.visible} recomendados para si.</b> Clique em <b>“Porquê este?”</b> em cada card para a AI explicar como se fosse a sua 1ª vez. <a href="/assistente-ai?pergunta=${encodeURIComponent(q)}" style="color:var(--red);font-weight:700">Abrir assistente completo →</a></div>`;
      document.getElementById('recondGrid')?.scrollIntoView({behavior:'smooth'});
    }, 400);
  });

  document.querySelectorAll('.ai-chip').forEach(b=>{
    b.addEventListener('click', ()=>{
      input.value=b.dataset.aiq;
      form.dispatchEvent(new Event('submit'));
    });
  });
}
