// Elite Digital — app.js v2 FIX configurador
document.addEventListener('DOMContentLoaded', ()=>{
  // slider autoplay
  const slides = document.querySelectorAll('.slider img');
  let idx=0;
  if(slides.length>1){
    setInterval(()=>{
      slides.forEach((s,i)=> s.style.display = i===idx ? 'block':'none');
      idx=(idx+1)%slides.length;
    }, 4000);
  }

  if(document.getElementById('configurator-root')){
    initConfiguratorV2();
  }

  // recondicionados filtros
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
      const grade = card.dataset.grade;
      const warranty = card.dataset.warranty;
      const price = parseFloat(card.dataset.price);
      const okGrade = activeGrades.length===0 || activeGrades.includes(grade);
      const okWar = activeWarranty.length===0 || activeWarranty.includes(warranty);
      const okPrice = price <= maxPrice;
      const show = okGrade && okWar && okPrice;
      card.style.display = show ? '' : 'none';
      if(show) visible++;
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

function initConfiguratorV2(){
  const state = {
    cpu: null,
    motherboard: null,
    ram: null,
    gpu: null,
    storage: null,
    case: null,
    psu: null,
    cooler: null,
  };
  const prices = {
    'cpu-i5':189.90, 'cpu-i7':389.90, 'cpu-r5':229.90, 'cpu-r7':449,
    'mb-b760':139.90, 'mb-b650':179.90, 'mb-z790':269.90,
    'ram-16-ddr4':49.90, 'ram-32-ddr5':119.90, 'ram-trident':139.90,
    'gpu-4060':329.90, 'gpu-4070':629.90, 'gpu-7600':269.90, 'gpu-5070':899.90,
    'ssd-1tb':89.90, 'ssd-2tb':129.90, 'hdd-2tb':59.90,
    'case-m100':49.90, 'case-h5':99.90, 'case-4000':94.90,
    'psu-550':54.90, 'psu-650':89.90, 'psu-850':129.90,
    'cool-212':39.90, 'cool-240':89.90
  };
  const watts = { 'cpu-i5':65, 'cpu-i7':65, 'cpu-r5':65, 'cpu-r7':120, 'gpu-4060':115, 'gpu-4070':220, 'gpu-7600':165, 'gpu-5070':300 };
  const socketMap = { 'cpu-i5':'LGA1700','cpu-i7':'LGA1700','cpu-r5':'AM5','cpu-r7':'AM5' };
  const mbSocket = { 'mb-b760':'LGA1700','mb-b650':'AM5','mb-z790':'LGA1700' };
  const mbRam = { 'mb-b760':'DDR4','mb-b650':'DDR5','mb-z790':'DDR5' };
  const stepsOrder = ['cpu','motherboard','ram','gpu','storage','case','psu','cooler'];
  let active = 'cpu';

  const stepEls = document.querySelectorAll('.step');
  const panels = document.querySelectorAll('.cfg-panel');
  const stepCounter = document.getElementById('stepCounter');
  const stepName = document.getElementById('stepName');

  function setActive(step){
    active = step;
    stepEls.forEach(s=>{
      s.classList.toggle('active', s.dataset.step===step);
    });
    panels.forEach(p=>{
      p.classList.toggle('active', p.dataset.panel===step);
    });
    const idx = stepsOrder.indexOf(step);
    if(stepCounter) stepCounter.textContent = (idx+1)+'/8';
    const h = document.querySelector(`.step[data-step="${step}"] h4`);
    if(stepName && h) stepName.textContent = h.textContent.replace(/^\d+\.\s*/,'');
    // scroll into view on mobile
    document.querySelector(`.cfg-panel[data-panel="${step}"]`)?.scrollIntoView({behavior:'smooth', block:'start'});
  }

  stepEls.forEach(s=>{
    s.addEventListener('click', ()=> setActive(s.dataset.step));
  });
  document.getElementById('btnNext')?.addEventListener('click', ()=>{
    const i = stepsOrder.indexOf(active);
    if(i < stepsOrder.length-1) setActive(stepsOrder[i+1]);
  });
  document.getElementById('btnPrev')?.addEventListener('click', ()=>{
    const i = stepsOrder.indexOf(active);
    if(i>0) setActive(stepsOrder[i-1]);
  });

  function renderSummary(){
    let total=0, watt=0, warnings=[];
    let html='';
    for(const cat of stepsOrder){
      const id = state[cat];
      if(!id) continue;
      const price = prices[id]||0;
      total+=price;
      if(watts[id]) watt+=watts[id];
      // find label
      const card = document.querySelector(`.comp-card[data-comp-id="${id}"]`);
      const label = card?.dataset.compName || id;
      // display friendly cat
      const catLabel = cat==='motherboard'?'PLACA-MÃE':cat.toUpperCase();
      html+=`<div class="summary-row"><span>${catLabel} — ${label}</span><b>${price.toFixed(2)} €</b></div>`;
    }
    if(state.cpu && state.motherboard){
      if(socketMap[state.cpu] !== mbSocket[state.motherboard]){
        warnings.push(`⚠️ Incompatibilidade de socket: CPU ${socketMap[state.cpu]} vs Board ${mbSocket[state.motherboard]}. Troque a placa-mãe.`);
      }
    }
    if(state.motherboard && state.ram){
      const need = mbRam[state.motherboard];
      const isDDR5 = state.ram.includes('ddr5') || state.ram.includes('trident');
      const ramType = isDDR5?'DDR5':'DDR4';
      if(need !== ramType) warnings.push(`⚠️ RAM incompatível: board exige ${need}, selecionou ${ramType}.`);
    }
    if(state.gpu && state.case){
      const gpuLen = { 'gpu-4060':227,'gpu-4070':307,'gpu-7600':240,'gpu-5070':320 }[state.gpu]||0;
      const caseMax = { 'case-m100':300,'case-h5':365,'case-4000':360 }[state.case]||999;
      if(gpuLen > caseMax) warnings.push(`⚠️ GPU com ${gpuLen}mm não cabe na caixa (máx ${caseMax}mm). Escolha ${state.gpu==='gpu-4070'?'NZXT H5 ou Corsair 4000D':''}`);
    }
    const psuWatt = state.psu ? { 'psu-550':550,'psu-650':650,'psu-850':850 }[state.psu]:0;
    const needed = Math.ceil(watt*1.3);
    if(psuWatt && psuWatt < needed) warnings.push(`⚠️ Fonte insuficiente: sistema precisa ~${needed}W, selecionou ${psuWatt}W.`);
    if(!state.psu && watt>0) warnings.push(`ℹ️ Potência estimada: ${watt}W (recomendado PSU ${needed}W).`);

    const itemsEl = document.getElementById('summary-items');
    if(itemsEl) itemsEl.innerHTML = html || '<p style="color:#888;font-size:13px">Selecione componentes à esquerda. Clique nos passos para navegar.</p>';
    const totalEl = document.getElementById('summary-total');
    if(totalEl) totalEl.textContent = total.toFixed(2)+' €';
    const wattEl = document.getElementById('summary-watt');
    if(wattEl) wattEl.textContent = watt + ' W';
    const needEl = document.getElementById('summary-needed');
    if(needEl) needEl.textContent = needed>0 ? needed+' W' : '—';
    const bar = document.getElementById('wattFill');
    if(bar){
      if(psuWatt){
        bar.style.width = Math.min(100, Math.round(watt/psuWatt*100))+'%';
        bar.style.background = psuWatt<needed?'#E30613':'#1a9e1a';
      } else {
        bar.style.width = '0%';
      }
    }
    const warnBox = document.getElementById('compatBox');
    if(warnBox){
      if(warnings.length){
        warnBox.innerHTML = warnings.map(w=>`<div class="${w.includes('⚠️')?'compat-warn':'compat-ok'}">${w}</div>`).join('');
      } else if(total>0){
        warnBox.innerHTML = '<div class="compat-ok">✅ Compatibilidade OK — todos os componentes são compatíveis.</div>';
      } else warnBox.innerHTML='';
    }

    // update step UI: check + price
    stepEls.forEach(s=>{
      const c = s.dataset.step;
      const priceEl = s.querySelector('.step-price');
      if(state[c]){
        s.classList.add('done');
        if(priceEl) priceEl.textContent = prices[state[c]]?.toFixed(2)+' €';
      } else {
        s.classList.remove('done');
        if(priceEl) priceEl.textContent = '—';
      }
    });

    // highlight incompatibles: fade out non-compatible boards/rams
    highlightCompat();
  }

  function highlightCompat(){
    // Motherboard filtering by CPU socket
    const cpuSock = state.cpu ? socketMap[state.cpu] : null;
    document.querySelectorAll('.cfg-panel[data-panel="motherboard"] .comp-card').forEach(card=>{
      const sock = card.dataset.socket;
      if(!cpuSock) { card.style.opacity='1'; card.style.filter='none'; }
      else if(sock===cpuSock){ card.style.opacity='1'; card.style.filter='none'; card.style.borderColor=''; }
      else { card.style.opacity='0.45'; card.style.filter='grayscale(0.5)'; }
    });
    // RAM filtering by motherboard
    const boardRam = state.motherboard ? mbRam[state.motherboard] : null;
    document.querySelectorAll('.cfg-panel[data-panel="ram"] .comp-card').forEach(card=>{
      const ram = card.dataset.ram;
      if(!boardRam) { card.style.opacity='1'; }
      else if(ram===boardRam){ card.style.opacity='1'; card.style.filter='none'; }
      else { card.style.opacity='0.35'; card.style.filter='grayscale(0.7)'; }
    });
  }

  document.querySelectorAll('[data-pick]').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      e.stopPropagation();
      const cat = btn.dataset.pick;
      const id = btn.dataset.compId;
      const wasSelected = state[cat]===id;
      state[cat]= wasSelected ? null : id;
      // update UI selected
      document.querySelectorAll(`[data-pick="${cat}"]`).forEach(b=>{
        const card = b.closest('.comp-card');
        card.classList.remove('selected');
        b.textContent='Escolher';
        b.style.background='';
      });
      if(state[cat]){
        const selCard = document.querySelector(`.comp-card[data-comp-id="${state[cat]}"]`);
        selCard?.classList.add('selected');
        const selBtn = selCard?.querySelector('[data-pick]');
        if(selBtn){ selBtn.textContent='✓ Escolhido'; selBtn.style.background='#1a9e1a'; }
        // auto-advance
        const idx = stepsOrder.indexOf(cat);
        if(idx < stepsOrder.length-1 && !wasSelected){
          setTimeout(()=> setActive(stepsOrder[idx+1]), 350);
        }
      }
      renderSummary();
    });
  });

  // also click card to pick
  document.querySelectorAll('.comp-card').forEach(card=>{
    card.addEventListener('click', (e)=>{
      if(e.target.closest('button')) return;
      const btn = card.querySelector('[data-pick]');
      if(btn) btn.click();
    });
  });

  setActive('cpu');
  renderSummary();

  const saveBtn = document.getElementById('btnSave');
  if(saveBtn) saveBtn.addEventListener('click', ()=>{
    const hash = Math.random().toString(36).slice(2,8).toUpperCase();
    const total = document.getElementById('summary-total').textContent;
    const share = document.getElementById('shareLink');
    const link = location.origin + location.pathname + '?build=CFG-2026-'+hash;
    if(share) share.value = link;
    // check completeness
    const missing = stepsOrder.filter(s=> !state[s]);
    if(missing.length>3){
      alert(`⚠️ Build incompleta — faltam: ${missing.join(', ')}\nTotal atual: ${total}\nLink: ${link}\n\nDica: complete todos os passos para fechar orçamento.`);
    } else {
      alert(`✅ Configuração guardada! Código: CFG-2026-${hash}\nTotal: ${total}\nLink copiado: ${link}`);
      navigator.clipboard?.writeText(link);
    }
  });
}
