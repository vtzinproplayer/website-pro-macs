<?php // assistente.php — Assistente AI Elite ?>
<div class="breadcrumb">
  <div class="container">
    <a href="/"><i class="fa fa-home"></i> Início</a> <span style="margin:0 6px">/</span> <b>Assistente AI Elite</b> <span style="background:#111;color:#ffea00;padding:2px 6px;border-radius:3px;font-size:11px;margin-left:8px">✨ NOVO • Beta</span>
  </div>
</div>

<div class="container">
  <div style="display:grid;grid-template-columns:1.1fr .9fr;gap:16px;align-items:center;padding:16px 0 8px">
    <div>
      <h1 style="margin:0;font-family:Poppins,sans-serif;font-size:24px;display:flex;gap:10px;align-items:center"><span style="width:38px;height:38px;background:var(--red);color:#fff;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:18px"><i class="fa fa-magic"></i></span> Assistente AI Elite <span style="background:#111;color:#fff;font-size:11px;padding:3px 8px;border-radius:20px">Inforlândia • PT</span></h1>
      <p style="margin:6px 0 0;color:#444;font-size:14px;line-height:1.5">Mesmo que <b>não perceba nada de informática</b>, a nossa AI guia-o passo a passo. Pergunte em português corrente — “quero um PC para jogar Fortnite até 700€” — e ela monta a solução ideal, explica cada peça <em>sem jargão</em> e verifica compatibilidade + montagem grátis.</p>
      <div style="display:flex;gap:8px;margin-top:10px;flex-wrap:wrap">
        <span style="background:#e6f0ff;color:#0a3d8a;padding:5px 10px;border-radius:20px;font-size:12px"><i class="fa fa-check"></i> Compatibilidade garantida</span>
        <span style="background:#e6f7e6;color:#0a6b0a;padding:5px 10px;border-radius:20px;font-size:12px"><i class="fa fa-wrench"></i> Montagem grátis</span>
        <span style="background:#fff7e6;color:#8a5a00;padding:5px 10px;border-radius:20px;font-size:12px"><i class="fa fa-graduation-cap"></i> Explica para iniciantes</span>
        <span style="background:#f0f0f0;color:#333;padding:5px 10px;border-radius:20px;font-size:12px"><i class="fa fa-comments"></i> Fala com humano se quiser</span>
      </div>
    </div>
    <div style="background:linear-gradient(135deg,#111,#2a0000);color:#fff;border-radius:10px;padding:14px;display:flex;gap:14px;align-items:center">
      <img src="https://i.pravatar.cc/100?img=15" alt="AI Avatar" style="width:56px;height:56px;border-radius:50%;border:2px solid #ffea00">
      <div>
        <b style="font-size:15px">Olá! Sou a Elite AI 🤖</b><br>
        <span style="font-size:13px;opacity:.9">Diga-me para que quer o PC e o seu orçamento. Eu trato do resto — e explico cada escolha como se fosse a sua primeira vez.</span>
        <div style="margin-top:8px;display:flex;gap:6px"><span style="background:#ffea00;color:#111;padding:3px 8px;border-radius:12px;font-size:11px;font-weight:700">PT • Respostas em segundos</span><span style="border:1px solid #555;color:#ccc;padding:3px 8px;border-radius:12px;font-size:11px">Ligada aos recondicionados ♻️</span></div>
      </div>
    </div>
  </div>
</div>

<div id="ai-root" class="container ai-layout">
  <!-- ESQUERDA — CHAT + QUESTIONÁRIO -->
  <div class="ai-left">
    <!-- CHAT -->
    <div class="ai-chat">
      <div class="chat-head"><i class="fa fa-circle" style="color:#1a9e1a;font-size:9px"></i> Assistente Elite AI — tempo médio <b>~18s</b> <span style="margin-left:auto;font-size:11px;color:#888">PT • Memória ligada aos recondicionados</span></div>
      <div id="chatLog" class="chat-log">
        <div class="msg ai">
          <img src="https://i.pravatar.cc/100?img=15" alt="AI">
          <div class="bubble">
            <b>Olá! 👋</b> Para o recomendar bem, diga-me em 1 frase: <b>para que vai usar o PC?</b><br>
            <small>Exemplos: “jogar valorant”, “faculdade / office / zoom”, “editar vídeos”, “não faço ideia, só quero algo que funcione”</small>
          </div>
        </div>
      </div>
      <div class="chips" id="chips">
        <button class="chip" data-q="Quero PC gaming até 800€, não percebo nada">🎮 Gaming até 800€</button>
        <button class="chip" data-q="Preciso para universidade, leve e barato, recondicionado se poupar">🎓 Universidade / leve</button>
        <button class="chip" data-q="Trabalho escritório + Excel, silencioso">💼 Escritório silencioso</button>
        <button class="chip" data-q="Não percebo nada, ajuda-me a escolher o melhor custo benefício">😅 Não percebo nada, ajuda!</button>
      </div>
      <form id="chatForm" class="chat-input">
        <input id="chatInput" type="text" placeholder="Escreva aqui... ex: 'Fortnite a 144hz até 900€'">
        <button type="submit"><i class="fa fa-paper-plane"></i></button>
      </form>
    </div>

    <!-- QUESTIONÁRIO GUIADO (para inexperientes) -->
    <div class="ai-quiz">
      <h3><i class="fa fa-list-ol" style="color:var(--red)"></i> Ou responda ao questionário guiado <span style="font-weight:400;color:#888;font-size:12px">(recomendado se é a 1ª vez)</span></h3>
      <div class="quiz-grid">
        <div class="q-group">
          <label>1. Para que vai usar?</label>
          <div class="options" id="optUso">
            <button class="opt" data-uso="gaming">🎮 Gaming</button>
            <button class="opt" data-uso="universidade">🎓 Estudo / Universidade</button>
            <button class="opt" data-uso="escritorio">💼 Escritório / Excel</button>
            <button class="opt" data-uso="edicao">🎬 Edição Vídeo / Design</button>
            <button class="opt" data-uso="programacao">💻 Programação</button>
            <button class="opt" data-uso="naosei">😅 Não sei / Uso geral</button>
          </div>
        </div>
        <div class="q-group">
          <label>2. Orçamento</label>
          <div style="display:flex;gap:10px;align-items:center">
            <input id="orcRange" type="range" min="300" max="2000" value="700" step="50" style="flex:1;accent-color:var(--red)">
            <b id="orcVal" style="min-width:90px;text-align:center;background:#111;color:#ffea00;padding:6px 10px;border-radius:6px">700 €</b>
          </div>
          <div style="display:flex;justify-content:space-between;font-size:11px;color:#888"><span>300€ recond.</span><span>2000€ topo</span></div>
        </div>
        <div class="q-group">
          <label>3. Experiência</label>
          <div class="options small">
            <button class="opt active" data-exp="inexperiente">😅 Inexperiente — explica tudo simples</button>
            <button class="opt" data-exp="intermedio">👍 Já percebo algo</button>
            <button class="opt" data-exp="avancado">🛠️ Já montei PCs</button>
          </div>
        </div>
        <div class="q-group">
          <label>4. Prefere novo ou recondicionado?</label>
          <div class="options small">
            <button class="opt active" data-pref="indiferente">🤝 Melhor negócio (AI escolhe)</button>
            <button class="opt" data-pref="novo">✨ Só novo</button>
            <button class="opt" data-pref="recondicionado">♻️ Prefiro recondicionado (poupa + sustentável)</button>
          </div>
        </div>
        <button id="btnGerar" class="btn btn-red" style="width:100%;justify-content:center;padding:14px;font-size:14px;margin-top:6px"><i class="fa fa-magic"></i> Gerar recomendação da AI</button>
        <p style="font-size:11px;color:#888;text-align:center;margin:6px 0 0"><i class="fa fa-lock"></i> Sem registo • Resposta em ~12s • Compatibilidade verificada • Montagem grátis Inforlândia</p>
      </div>
    </div>
  </div>

  <!-- DIREITA — RECOMENDAÇÕES AI + CONFIGURADOR SIMPLIFICADO -->
  <div class="ai-right">
    <div id="aiResult" class="ai-result empty">
      <div style="text-align:center;padding:30px 14px;color:#888">
        <div style="font-size:40px">✨</div>
        <h3 style="margin:8px 0;color:#333">A sua recomendação aparecerá aqui</h3>
        <p style="font-size:13px;margin:0">A AI vai explicar cada peça em linguagem simples, mostrar o total, alternativas recondicionadas e um botão <b>“Montar para mim”</b>.</p>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:14px;text-align:left">
          <div style="border:1px solid var(--border);border-radius:6px;padding:10px;background:#fff"><b style="font-size:12px">Exemplo iniciante:</b><br><span style="font-size:12px;color:#555">“Este processador é o ‘cérebro’. Escolhi o i5 porque é ótimo para jogos e não precisa de mais para o seu orçamento.”</span></div>
          <div style="border:1px solid var(--border);border-radius:6px;padding:10px;background:#fff"><b style="font-size:12px">Exemplo recondicionado:</b><br><span style="font-size:12px;color:#555">“Encontrei o mesmo desempenho por -38% num Grade A+ com 24 meses garantia. Poupa 312kg CO₂.”</span></div>
        </div>
      </div>
    </div>

    <!-- Mini configurador assistido (aparece após recomendação) -->
    <div id="miniBuilder" class="mini-builder" style="display:none">
      <div class="mb-head"><h4><i class="fa fa-cogs"></i> Ajuste fino assistido</h4><small>AI explica cada troca</small></div>
      <div id="mbList" class="mb-list"></div>
    </div>

    <div style="margin-top:12px;border:1px solid #a3d9a3;background:#e6f7e6;border-radius:6px;padding:10px;display:flex;gap:10px;align-items:flex-start">
      <i class="fa fa-shield" style="color:#1a9e1a;font-size:22px;margin-top:2px"></i>
      <div style="font-size:12px;line-height:1.4"><b>Garantia AI Elite: compatibilidade 100% ou devolvemos.</b> Todos os builds são validados (socket, RAM, PSU, tamanho) e montados/testados 24h pela Inforlândia — mesmo que nunca tenha aberto um PC na vida.</div>
    </div>

    <div style="margin-top:12px;border:1px solid var(--border);border-radius:6px;background:#fff;padding:12px">
      <h4 style="margin:0 0 8px;font-size:13px"><i class="fa fa-headphones" style="color:var(--red)"></i> Prefere falar com humano?</h4>
      <p style="margin:0 0 8px;font-size:12px;color:#555">A AI transfere para um técnico Inforlândia em Aveiro sem perder o histórico.</p>
      <div style="display:flex;gap:8px"><a href="#" class="btn btn-outline" style="flex:1;justify-content:center;font-size:12px"><i class="fa fa-phone"></i> 234 340 800</a><a href="#" class="btn btn-dark" style="flex:1;justify-content:center;font-size:12px"><i class="fa fa-comments"></i> Chat humano</a></div>
    </div>
  </div>
</div>

<!-- BARRA de confiança -->
<div class="container" style="margin-top:16px;display:grid;grid-template-columns:repeat(4,1fr);gap:10px">
  <div class="feat"><i class="fa fa-graduation-cap"></i><div><b>Explica sem jargão</b><br><span>“RAM é memória rápida…”</span></div></div>
  <div class="feat"><i class="fa fa-recycle"></i><div><b>Ligada ao catálogo ♻️</b><br><span>Recondicionados em tempo real</span></div></div>
  <div class="feat"><i class="fa fa-bolt"></i><div><b>Calcula tudo</b><br><span>PSU, fps, bottleneck</span></div></div>
  <div class="feat"><i class="fa fa-wrench"></i><div><b>Monta por si</b><br><span>Grátis, cabos e testes</span></div></div>
</div>
