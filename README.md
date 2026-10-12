# Elite Digital — Clone + 2 Novas Features AI

> **Réplica fiel do website [elitedigital.pt](https://www.elitedigital.pt) mantendo estilo, design e tecnologia originais, com duas funcionalidades exclusivas focadas em AI.**

![PHP](https://img.shields.io/badge/PHP-8.2-%23777BB4?logo=php)
![PrestaShop](https://img.shields.io/badge/PrestaShop-8.1-%23DF0067?logo=prestashop)
![Warehouse](https://img.shields.io/badge/Theme-Warehouse_IQIT-red)
![AI](https://img.shields.io/badge/AI-Assistente_Elite-111?logo=openai)
![MySQL](https://img.shields.io/badge/MySQL-8.0-%234479A1?logo=mysql)

---

## 🔗 Repositório GitHub

**Link oficial do projeto:**

```
https://github.com/elite-digital-pt/elite-digital-clone
```

> Este diretório local em `/home/user/elite-digital` já é um repositório **Git** pronto para push.

```bash
cd /home/user/elite-digital
git remote add origin https://github.com/elite-digital-pt/elite-digital-clone.git
git branch -M main
git push -u origin main
```

Se ainda não criou o repositório no GitHub:
1. Aceda a https://github.com/new
2. Nome: `elite-digital-clone` • Visibilidade: Public ou Private
3. **Não** inicialize com README (já existe)
4. Execute os comandos acima

---

## 🎯 Objetivo — Atualização pedida

Pegar no código-fonte conceptual do **Elite Digital** (PrestaShop 8 + tema **Warehouse by IQITElementor**) e manter **100% do estilo/design**, acrescentando **apenas** duas novas funcionalidades **integradas entre si**:

| # | Feature | Rota | Descrição |
|---|---|---|---|
| 1 | **✨ Assistente AI Elite** | `/assistente-ai` (`/assistente`) | Chat AI que guia mesmo **inexperientes** a comprar/montar PC: pergunta em linguagem natural, explica cada peça sem jargão, compara novo vs recondicionado, valida compatibilidade e oferece montagem grátis |
| 2 | **♻️ Catálogo Recondicionados + AI** | `/recondicionados` | Catálogo dedicado ♻️ (grades A+/A/B, garantia, fotos reais) **funciona junto com a AI**: a AI filtra o catálogo ao vivo (“melhor até 600€ para faculdade”), explica “Porquê este?” e recomenda recondicionado quando poupa 300-400€ |

> **Legacy:** `/configurador` redireciona para `/assistente-ai` (o configurador clássico foi absorvido pela AI).

**Stack idêntica à original:**
- **Linguagem:** PHP 8.2 (mesma do PrestaShop)
- **Template Engine:** Smarty 4 (PrestaShop)
- **Base de Dados:** MySQL 8 / MariaDB 10.6
- **Tema Base:** Warehouse 2.x (IQIT) — child theme `warehouse-child-elite`
- **Front-end:** HTML5 + CSS3 + Bootstrap 4 + Vanilla JS (AI sem dependências externas para demo; pronto para ligar a OpenAI API)
- **Back-office:** Módulos PrestaShop nativos

---

## 🖥️ Demo Local

```bash
# 1. Instalar dependências
composer install

# 2. Configurar ambiente
cp .env.example .env
# editar DB_HOST, DB_NAME, DB_USER, DB_PASS

# 3. Importar base de dados
mysql -u root -p < sql/schema.sql
mysql -u root -p < sql/demo_data.sql

# 4. Servidor PHP embutido (preview) — ou Python para demo estática
php -S 0.0.0.0:8000 -t public
# ou
python3 -m http.server 8000 --directory public
# Abrir http://localhost:8000 → /assistente-ai e /recondicionados
```

Preview Arena já configurado: `https://8000-*.e2b.app` → `assistente.html` e `recondicionados.html`

---

## 📁 Estrutura

```
elite-digital/
├── public/                 # DocumentRoot
│   ├── index.php           # Front Controller (router)
│   ├── .htaccess           # Rewrites PrestaShop + /assistente-ai
│   ├── assistente.html     # Preview estático AI
│   ├── recondicionados.html# Preview estático catálogo + AI
│   └── assets/
│       ├── css/theme.css   # Warehouse + AI styles (red #E30613)
│       ├── js/app.js       # AI chat + catalogo AI + filtros
│       └── img/
├── templates/
│   ├── layout/
│   │   ├── header.tpl      # Header fiel + busca “Pergunte à AI”
│   │   └── footer.tpl      # Footer Inforlândia
│   └── pages/
│       ├── home.php        # Hero AI + Recondicionados+AI
│       ├── assistente.php  # ✨ Assistente AI (chat + quiz guiado + resultado)
│       └── recondicionados.php # ♻️ Catálogo + barra AI integrada
├── src/
│   └── Models/
│       ├── ReconditionedProduct.php
│       └── AiAssistant.php # Lógica recomendação (uso, orçamento, inexperiente)
├── modules/
│   ├── ai_assistant/       # Módulo PrestaShop: ps_ai_assistant
│   │   ├── ps_ai_assistant.php
│   │   ├── sql/install.sql # ai_conversation
│   │   └── views/
│   └── recondicionados/    # Módulo PrestaShop: ps_reconditioned (com AI badges)
├── theme/
│   └── warehouse-child-elite/
├── config/
│   ├── database.php
│   └── routes.php          # /assistente-ai, /recondicionados, /api/ai/*
└── sql/
    ├── schema.sql          # ps_reconditioned_product + ps_pc_component etc
    └── demo_data.sql
```

---

## ✨ Feature 1 — Assistente AI Elite (`/assistente-ai`)

**Objetivo:** Ajudar **mesmo inexperientes** a comprar/montar PC.

**Como funciona (demo sem API externa, regra + pronta para OpenAI):**
- **Chat natural:** “Quero PC gaming até 800€, não percebo nada” → AI detecta *uso=gaming, orçamento=800, inexperiente* e responde em PT, sem jargão.
- **Questionário guiado (4 passos):**
  1. Para que vai usar? (Gaming / Universidade / Escritório / Edição / Não sei)
  2. Orçamento (slider 300-2000€)
  3. Experiência (Inexperiente → explica “processador = cérebro” / Intermédio / Avançado)
  4. Prefere novo ou recondicionado? (AI escolhe melhor negócio / Só novo / Só recondicionado ♻️)
- **Geração:** Botão “Gerar recomendação da AI” → typing 0.8s → card recomendação:
  - Título, imagem, preço, selo `♻️ RECONDICIONADO` ou `✨ NOVO`
  - **Explica sem jargão:** “RTX 3060 é a peça que desenha jogos. 16GB é memória rápida…”
  - **Compara novo vs recondicionado:** “Novo equivalente 1.049€, este recondicionado 649€ — poupa 400€, mesma performance, 24m garantia, -312kg CO₂”
  - Ações: *Adicionar ao carrinho*, *Ver no catálogo ♻️*, *Pedir ajuste* (“mete mais RAM”)
  - **Mini-builder assistido** + **Garantia:** compatibilidade 100% ou devolvemos, montagem grátis 24h testes.
- **Chips rápidos:** 🎮 Gaming até 800€, 🎓 Universidade leve, 💼 Escritório silencioso, 😅 Não percebo nada
- **Integração catálogo:** Botão “Ver no catálogo” filtra os recondicionados pela mesma consulta.

**Back-office PrestaShop:**
- Módulo `ps_ai_assistant` com tabela `ps_ai_conversation` (query, recomendação JSON)
- Hook `displayTop` banner “✨ Assistente AI”
- Pronto para ligar a `OPENAI_API_KEY` em `.env` → trocar `gerarRecomendacao()` por chamada `fetch('/api/ai/recommend')`.

---

## ♻️ Feature 2 — Catálogo Recondicionados + AI (`/recondicionados`)

**Imita categoria Warehouse + adiciona camada AI:**

- **Banner AI no topo:** Input “Pergunte à AI: gaming até 650€...” + chips AI (gaming barato, universidade até 500€, etc.)
- **Filtros Warehouse** originais: Grade A+/A/B, Garantia 24/12, Marca, Preço, Inclui
- **AI filtra o catálogo ao vivo:** Ao perguntar à AI, JS filtra `data-uso`/`data-ai`/`data-price` e mostra só 2-3 recomendados com selo `✨ AI recomenda para si` + botão **“Porquê este?”** que abre explicação sem jargão.
- **Cards com:** estado estético, ciclos/bateria, fotos reais, selo CO₂, preço novo vs recondicionado
- **Filtros + AI combinam:** Filtros laterais + filtro AI funcionam juntos.
- **CTA:** Cada card tem “Perguntar AI” que leva ao assistente com a mesma pergunta pré-preenchida (`?pergunta=...`).

**Tabelas:**
```sql
ps_reconditioned_product (id_product, grade, warranty_months, battery_cycles, cosmetic_notes, co2_saved)
ps_ai_conversation (id_conversation, query, recomendacao JSON)
```

---

## 🎨 Design — Fidelidade ao Original

| Elemento | Original | Réplica |
|---|---|---|
| Cor primária | `#E30613` / `#FA0707` / `#BC0404` | idem + variáveis CSS |
| Header | Logo left, pesquisa centro largo, ícones conta/carrinho | idem — pesquisa agora “Pergunte à AI” |
| MegaMenu | Barra vermelha sticky | idem — novos itens `✨ ASSISTENTE AI` (preto) + `♻️ RECONDICIONADOS + AI` |
| Cards | Borda `#eee`, badge Esgotado/Disponível, preço vermelho | idem + badge `✨ AI recomenda` |
| Footer | Preto Inforlândia, Cofidis/Multibanco | idem |
| Tipografia | Open Sans / Poppins | idem |

Nenhum redesign — apenas novas entradas destacadas com badge **AI**.

---

## 🔧 Instalação PrestaShop (produção)

```bash
# 1. Copiar child theme
cp -r theme/warehouse-child-elite /seu/prestashop/themes/

# 2. Copiar módulos
cp -r modules/ai_assistant /seu/prestashop/modules/ps_ai_assistant
cp -r modules/recondicionados /seu/prestashop/modules/ps_reconditioned

# 3. Back-office:
#   Aparência > Tema > Usar warehouse-child-elite
#   Módulos > Gerir > Instalar ps_ai_assistant + ps_reconditioned

# 4. Limpar cache
php bin/console prestashop:cache:clear
```

Para ligar AI real, defina em `.env`:
```
OPENAI_API_KEY=sk-...
AI_MODEL=gpt-4o-mini
```

---

## 📄 Licença & Notas

- Réplica inspirada para fins académicos/portfólio, sem redistribuir código proprietário Warehouse.
- Imagens: Unsplash / INSYS (fair use demo).
- AI demo é **rule-based local** para funcionar offline; pronta para trocar por chamada OpenAI no `app.js` → `fetch('/api/ai/recommend')`.

---

**Desenvolvido em PHP 8.2 — mesma linguagem do elitedigital.pt — pronto para GitHub.**  
*Aveiro, 12-10-2026*
