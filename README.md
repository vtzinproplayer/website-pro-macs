# Elite Digital — Clone + 2 Novas Features

> **Réplica fiel do website [elitedigital.pt](https://www.elitedigital.pt) mantendo estilo, design e tecnologia originais, com duas funcionalidades exclusivas.**

![PHP](https://img.shields.io/badge/PHP-8.2-%23777BB4?logo=php)
![PrestaShop](https://img.shields.io/badge/PrestaShop-8.1-%23DF0067?logo=prestashop)
![Warehouse](https://img.shields.io/badge/Theme-Warehouse_IQIT-red)
![MySQL](https://img.shields.io/badge/MySQL-8.0-%234479A1?logo=mysql)

---

## 🔗 Repositório GitHub

**Link oficial do projeto:**

```
https://github.com/elite-digital-pt/elite-digital-clone
```

> Este diretório local em `/home/user/elite-digital` já é um repositório **Git** pronto para push. Veja **[Como publicar no GitHub](#-como-publicar-no-github)** abaixo.

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

## 🎯 Objetivo do Projeto

Pegar no código-fonte conceptual do **Elite Digital** (PrestaShop 8 + tema **Warehouse by IQITElementor**) e manter **100% do estilo/design**, acrescentando **apenas** duas novas funcionalidades:

| # | Feature | Rota | Descrição |
|---|---|---|---|
| 1 | **Computadores Recondicionados** | `/recondicionados` | Catálogo dedicado a equipamentos recondicionados com grades, garantia e selo de qualidade |
| 2 | **Configurador de PCs** | `/configurador` | PC builder interativo com verificação de compatibilidade, cálculo de potência e preço em tempo real |

**Stack idêntica à original:**
- **Linguagem:** PHP 8.2 (mesma do PrestaShop)
- **Template Engine:** Smarty 4 (PrestaShop)
- **Base de Dados:** MySQL 8 / MariaDB 10.6
- **Tema Base:** Warehouse 2.x (IQIT) — child theme `warehouse-child-elite`
- **Front-end:** HTML5 + CSS3 + Bootstrap 4 + jQuery (como no original) + Vanilla JS para as novas features
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

# 4. Servidor PHP embutido (preview)
php -S 0.0.0.0:8000 -t public
# Abrir http://localhost:8000
```

Preview Arena já configurado: `https://8000-*.e2b.app`

---

## 📁 Estrutura

```
elite-digital/
├── public/                 # DocumentRoot — ponto de entrada web
│   ├── index.php           # Front Controller (router)
│   ├── .htaccess           # Rewrites PrestaShop
│   └── assets/
│       ├── css/theme.css   # Warehouse + custom (red #E30613)
│       ├── js/app.js       # Sliders, megamenu, configurador
│       └── img/
├── templates/
│   ├── layout/
│   │   ├── header.tpl      # Header fiel ao original
│   │   └── footer.tpl      # Footer com selos Inforlândia
│   └── partials/
│       ├── megamenu.tpl
│       ├── product-card.tpl
│       └── breadcrumbs.tpl
├── src/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   ├── RecondicionadosController.php
│   │   └── ConfiguradorController.php
│   └── Models/
│       ├── Product.php
│       ├── ReconditionedProduct.php
│       └── PcBuild.php
├── modules/
│   ├── recondicionados/    # Módulo PrestaShop: ps_reconditioned
│   │   ├── ps_reconditioned.php
│   │   ├── sql/install.sql
│   │   └── views/
│   └── pcconfigurador/     # Módulo PrestaShop: ps_pcconfigurator
│       ├── ps_pcconfigurator.php
│       ├── sql/install.sql
│       └── views/
├── theme/
│   └── warehouse-child-elite/ # Child theme que herda Warehouse
├── config/
│   ├── database.php
│   └── routes.php
└── sql/
    ├── schema.sql
    └── demo_data.sql
```

---

## ✨ Feature 1 — Computadores Recondicionados

**Rota:** `/recondicionados` (`/pt/441-computadores-recondicionados`)

**Espelha o design de categoria PrestaShop:**
- Filtros laterais Warehouse (IQIT): **Grade (A+/A/B), Garantia, Processador, RAM, Armazenamento, Preço**
- Selos visuais: `Grade A+` verde, `Grade A` azul, `Grade B` amarelo + badge `Recondicionado Certificado — 24 Meses Garantia`
- Ordenação por relevância, preço, novidade
- Cada produto mostra: estado estético, bateria/ciclos, acessórios incluídos, fotos reais do exemplar
- Selo sustentabilidade: “♻️ Poupou 280kg CO₂ vs novo”

**Back-office (PrestaShop):**
- Novo separador no catálogo: *Catálogo > Recondicionados*
- Campos extra: `condition_grade`, `battery_health`, `warranty_months`, `previous_use`, `co2_saved`
- Import CSV dedicado
- Etiqueta automática no front + gestão de stock por exemplar (nº série)

**Tabelas MySQL:**
```sql
ps_reconditioned_product (id_product, grade, warranty_months, battery_cycles, cosmetic_notes, co2_saved)
ps_reconditioned_images (id_product, image_url, is_real_photo)
```

---

## 🔧 Feature 2 — Configurador de PCs

**Rota:** `/configurador` (`/pt/configurador-pc`)

**UX inspirada em PCPartPicker + estilo Elite Digital (cards brancos, borda cinza, CTA vermelho):**

**Fluxo em 8 passos:**
1. **CPU** → filtra socket
2. **Placa Mãe** → só compatíveis com socket + chipset
3. **RAM** → filtra DDR4/DDR5 conforme board
4. **GPU** → verifica comprimento vs caixa + PSU watt
5. **Armazenamento** → M.2/SATA conforme slots
6. **Caixa** → filtra ATX/mATX vs board
7. **Fonte (PSU)** → calculadora automática (TDP ×1.3) + alerta se insuficiente
8. **Refrigeração / Extras** → cooler altura vs caixa

**Funcionalidades:**
- ✅ Verificação de compatibilidade em tempo real (JS + PHP)
- ✅ Cálculo de potência e preço total live
- ✅ Avisos: “⚠️ Esta GPU exige 650W, selecionou 550W”
- ✅ Botões: *Adicionar build ao carrinho*, *Guardar configuração*, *Partilhar link*, *Pedir montagem (grátis)*
- ✅ Gera SKU único: `CFG-2026-XXXX` e cria produto pack no carrinho PrestaShop
- ✅ PDF de orçamento + QR code

**Tabelas MySQL:**
```sql
ps_pc_component (id, category, name, brand, price, specs JSON, socket, watt, image)
ps_pc_build (id, customer_id, hash, total_price, watt_total, is_compatible)
ps_pc_build_item (id_build, id_component, qty)
```

Compatibilidade validada em `src/Models/PcBuild.php::validate()` e `public/assets/js/configurador.js`.

---

## 🎨 Design — Fidelidade ao Original

| Elemento | Original | Réplica |
|---|---|---|
| Cor primária | `#E30613` / `#FA0707` / `#BC0404` | idem + variáveis CSS |
| Header | Logo left, pesquisa centro largo, ícones conta/carrinho right, topbar preto | idem |
| MegaMenu | Barra vermelha sticky, categorias uppercase “COMPUTADORES • COMPONENTES • PERIFÉRICOS...” | idem (IQIT Megamenu JSON) |
| Sliders | RevSlider + banners INSYS/.FORCE | idem (Swiper.js) |
| Cards produto | Borda `#eee`, badge “Esgotado/Disponível”, preço vermelho bold | idem |
| Footer | Preto `#1a1a1a`, colunas: Apoio, Categorias, Contactos Inforlândia Aveiro, pagamentos Cofidis/Multibanco | idem |
| Tipografia | Open Sans / Poppins (Warehouse) | idem |
| PrestaShop | `Loja powered by PrestaShop` no title | mantido |

Nenhum redesign — apenas novas entradas no menu: `Recondicionados ♻️` e `Configurador 🛠️` destacadas com badge **NOVO**.

---

## 🔧 Instalação PrestaShop (produção)

Se já tem PrestaShop 8.1 instalado com tema Warehouse:

```bash
# 1. Copiar child theme
cp -r theme/warehouse-child-elite /seu/prestashop/themes/

# 2. Copiar módulos
cp -r modules/recondicionados /seu/prestashop/modules/ps_reconditioned
cp -r modules/pcconfigurador /seu/prestashop/modules/ps_pcconfigurator

# 3. No back-office:
#   Aparência > Tema > Usar warehouse-child-elite
#   Módulos > Gerir > Instalar ps_reconditioned + ps_pcconfigurator

# 4. Limpar cache
php bin/console prestashop:cache:clear
```

---

## 📄 Licença & Notas

- Código original Elite Digital / Inforlândia © — esta réplica é **inspirada** para fins académicos/portfólio, sem redistribuir código proprietário ou assets licenciados do Warehouse.
- Para uso comercial, adquira licença do tema **Warehouse** (IQIT) e PrestaShop.
- Imagens de produtos: placeholders Unsplash / INSYS (fair use demo).

---

**Desenvolvido em PHP 8.2 — mesma linguagem do elitedigital.pt — pronto para GitHub.**  
*Aveiro, 12-10-2026*
