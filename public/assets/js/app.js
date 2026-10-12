// Elite Digital — app.js
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

  // configurator logic (if on page)
  if(document.getElementById('configurator-root')){
    initConfigurator();
  }

  // recondicionados filtros (client side demo)
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
    document.getElementById('priceRangeVal').textContent = maxPrice + ' €';
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

  // cart toast
  document.querySelectorAll('[data-add-cart]').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      e.preventDefault();
      const name = btn.dataset.addCart;
      btn.textContent='✓ Adicionado';
      btn.style.background='#1a9e1a';
      setTimeout(()=>{ btn.innerHTML='<i class="fa fa-shopping-cart"></i> Adicionar'; btn.style.background=''; },1500);
      // update count
      const el = document.querySelector('.cart-count');
      if(el) el.textContent = parseInt(el.textContent||'0',10)+1;
    });
  });
});

function initConfigurator(){
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

  function renderSummary(){
    let total=0, watt=0, warnings=[];
    let html='';
    for(const [cat, id] of Object.entries(state)){
      if(!id) continue;
      const price = prices[id]||0;
      total+=price;
      if(watts[id]) watt+=watts[id];
      const label = document.querySelector(`[data-comp-id="${id}"]`)?.dataset.compName || id;
      html+=`<div class="summary-row"><span>${cat.toUpperCase()} — ${label}</span><b>${price.toFixed(2)} €</b></div>`;
    }
    // compatibility checks
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
      if(gpuLen > caseMax) warnings.push(`⚠️ GPU com ${gpuLen}mm não cabe na caixa (máx ${caseMax}mm).`);
    }
    const psuWatt = state.psu ? { 'psu-550':550,'psu-650':650,'psu-850':850 }[state.psu]:0;
    const needed = Math.ceil(watt*1.3);
    if(psuWatt && psuWatt < needed) warnings.push(`⚠️ Fonte insuficiente: sistema precisa ~${needed}W, selecionou ${psuWatt}W. Recomendado 650W ou superior.`);
    if(!state.psu && watt>0) warnings.push(`ℹ️ Potência estimada: ${watt}W (recomendado PSU ${needed}W).`);

    document.getElementById('summary-items').innerHTML = html || '<p style="color:#888;font-size:13px">Selecione componentes à esquerda para ver o resumo.</p>';
    document.getElementById('summary-total').textContent = total.toFixed(2)+' €';
    document.getElementById('summary-watt').textContent = watt + ' W';
    const needEl = document.getElementById('summary-needed');
    if(needEl) needEl.textContent = needed>0 ? needed+' W' : '—';
    const bar = document.getElementById('wattFill');
    if(bar && psuWatt){ bar.style.width = Math.min(100, Math.round(watt/psuWatt*100))+'%'; bar.style.background = psuWatt<needed?'#E30613':'#1a9e1a'; }

    const warnBox = document.getElementById('compatBox');
    if(warnings.length){
      warnBox.innerHTML = warnings.map(w=>`<div class="${w.includes('⚠️')?'compat-warn':'compat-ok'}">${w}</div>`).join('');
    } else if(total>0){
      warnBox.innerHTML = '<div class="compat-ok">✅ Compatibilidade OK — todos os componentes são compatíveis.</div>';
    } else warnBox.innerHTML='';
  }

  document.querySelectorAll('[data-pick]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const cat = btn.dataset.pick;
      const id = btn.dataset.compId;
      // toggle
      if(state[cat]===id) state[cat]=null; else state[cat]=id;
      // update UI
      document.querySelectorAll(`[data-pick="${cat}"]`).forEach(b=> b.closest('.comp-card').classList.remove('selected'));
      if(state[cat]) document.querySelector(`[data-comp-id="${state[cat]}"]`)?.closest('.comp-card')?.classList.add('selected');
      // update step indicator
      document.querySelectorAll('.step').forEach(s=>{
        const c = s.dataset.step;
        if(state[c]) s.classList.add('done'); else s.classList.remove('done');
        const priceEl = s.querySelector('.step-price');
        if(priceEl) priceEl.textContent = state[c] ? (prices[state[c]]?.toFixed(2)+' €') : '—';
      });
      renderSummary();
    });
  });

  renderSummary();

  // save/share
  const saveBtn = document.getElementById('btnSave');
  if(saveBtn) saveBtn.addEventListener('click', ()=>{
    const hash = Math.random().toString(36).slice(2,8).toUpperCase();
    const total = document.getElementById('summary-total').textContent;
    alert(`✅ Configuração guardada! Código: CFG-2026-${hash}\nTotal: ${total}\n(Ligação partilhável copiada — demo)`);
    const share = document.getElementById('shareLink');
    if(share) share.value = location.origin + '/configurador?build=CFG-2026-'+hash;
  });
}
