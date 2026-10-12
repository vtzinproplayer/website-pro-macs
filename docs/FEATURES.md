# Features — Detalhe Funcional

## 1. Computadores Recondicionados (`/recondicionados`)

**Imita página de categoria Warehouse:**

- Breadcrumb + banner verde sustentabilidade
- Sidebar filtros IQIT: Grade, Garantia, Marca, Preço, Inclui
- Cards com badge `Grade A+` verde / `A` azul / `B` amarelo + selo `24 meses garantia`
- Cada card mostra: ciclos, saúde bateria, notas estéticas, CO₂ poupado
- Filtro client-side (JS) + server-side (PHP `RecondicionadosController::list` com SQL WHERE grade/warranty/price)
- Modal detalhe: galeria fotos reais, relatório bateria, testes, acessórios incluídos, botão adicionar ao carrinho (PrestaShop Cart)

**Back-office:**

- Menu `Catálogo > Recondicionados`
- Grid com filtros grade, edição inline, import CSV (colunas id_product, grade, warranty, cycles, health, notes, serial)
- Ao guardar, atualiza `ps_reconditioned_product` e limpa cache Smarty

## 2. Configurador de PCs (`/configurador`)

**8 passos sequenciais:**

1. CPU → define socket (LGA1700/AM5)
2. Motherboard → filtra por socket, mostra chipset, M.2, Wi-Fi
3. RAM → filtra DDR4/DDR5 conforme board
4. GPU → mostra watt, comprimento, portas; alerta se > caixa
5. Storage → NVMe/SATA conforme slots board
6. Caixa → filtra ATX/mATX, mostra max GPU
7. PSU → calcula watt total ×1.3, alerta se insuficiente
8. Cooler → verifica altura vs caixa

**Componentes tabelados em `ps_pc_component` com JSON specs.**

**Resumo live (direita, sticky):**

- Lista itens escolhidos + preço unitário
- Total live
- Potência estimada + barra watt/psu
- Caixa compatibilidade (verde OK / amarelo aviso / vermelho erro)
- Ações: Guardar build (gera hash CFG-2026-XXXX + link), Adicionar ao carrinho (cria pack PrestaShop + `Cart::add`), Gerar PDF (jsPDF), Partilhar link (clipboard)

**Compatibilidade validada em dois sítios:**

- JS `initConfigurator()` para feedback instantâneo
- PHP `PcBuild::validate()` no POST `/api/configurador/validate` e no `addBuildToCart`

**Persistência:**

- Build guardado em `ps_pc_build` + `ps_pc_build_item`
- Hash partilhável: `https://elitedigital.pt/configurador?build=CFG-2026-A1B2C3`
