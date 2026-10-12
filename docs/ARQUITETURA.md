# Arquitetura — Elite Digital Clone

## Stack Idêntica ao Original

| Camada | Elite Digital real | Clone |
|---|---|---|
| Linguagem | PHP 7.4/8.2 | PHP 8.2 |
| E-commerce | PrestaShop 1.7/8 | PrestaShop 8.1 (standalone router compatível) |
| Template | Smarty 4 + Warehouse | Smarty 4 + child theme |
| BD | MySQL | MySQL 8 |
| Front | jQuery + Bootstrap 4 + RevSlider | jQuery + Bootstrap 4 + Swiper + Vanilla JS |
| Servidor | Apache + Hetzner | Apache/Nginx |

## Fluxo

```
public/index.php (Front Controller)
  → config/routes.php
  → src/Controllers/* (Home, Recondicionados, Configurador)
  → src/Models/* (Product, PcBuild)
  → templates/layout/layout.tpl → header.tpl + page + footer.tpl
  → modules/* (hooks PrestaShop)
```

## Módulos PrestaShop

- `ps_reconditioned` — adiciona tabela `ps_reconditioned_product`, hook `displayProductAdditionalInfo` (badge grade), back-office `AdminReconditioned`
- `ps_pcconfigurator` — tabelas `ps_pc_component`, `ps_pc_build`, rota `module/ps_pcconfigurator/configurator`, hook `displayTop` (promo bar), serviço `PcBuild::validate()`

## Compatibilidade Configurador

Centralizada em `src/Models/PcBuild.php::validate()` — usada tanto no PHP (API, carrinho) quanto replicada em JS para feedback instantâneo:

- Socket CPU vs Motherboard
- DDR4 vs DDR5
- Comprimento GPU vs caixa
- Watt (TDP ×1.3) vs PSU
