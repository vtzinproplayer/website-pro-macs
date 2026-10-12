# Instalação — Elite Digital Clone

## Requisitos
- PHP 8.1+ (8.2 recomendado, igual ao servidor Elite Digital)
- MySQL 8 / MariaDB 10.6
- Apache + mod_rewrite ou Nginx
- Composer
- PrestaShop 8.1 (opcional, para modo full)

## Modo 1 — Demo Standalone (sem PrestaShop, recomendado para avaliação rápida)

```bash
git clone https://github.com/elite-digital-pt/elite-digital-clone.git
cd elite-digital-clone
cp .env.example .env
php -S 0.0.0.0:8000 -t public
# http://localhost:8000
# /recondicionados
# /configurador
```

Não precisa base de dados — dados demo já embutidos no front-end. Para persistência, importe `sql/schema.sql`.

## Modo 2 — PrestaShop 8 + Warehouse (produção fiel)

1. Instale PrestaShop 8.1 vanilla
2. Compre/Instale tema **Warehouse** (IQIT)
3. Copie este projeto:

```bash
cp -r theme/warehouse-child-elite /seu/prestashop/themes/
cp -r modules/recondicionados /seu/prestashop/modules/ps_reconditioned
cp -r modules/pcconfigurador /seu/prestashop/modules/ps_pcconfigurator
```

4. Back-office → Aparência → Tema → Ativar `warehouse-child-elite`
5. Módulos → Instalar `ps_reconditioned` e `ps_pcconfigurator`
6. Importe `sql/schema.sql` + `sql/demo_data.sql`
7. Limpe cache: `php bin/console cache:clear`

## Configuração

Edite `.env`:
```
DB_HOST=127.0.0.1
DB_NAME=elite_digital
DB_USER=root
DB_PASS=secret
```

## Testes

```bash
composer test
php vendor/bin/phpunit tests/PcBuildTest.php
```
