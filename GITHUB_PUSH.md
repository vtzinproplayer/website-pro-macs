# Como publicar no GitHub e obter o link final

O repositório local já está pronto em `/home/user/elite-digital` (branch `main`).

## Opção A — via browser (mais rápida)
1. Aceda a https://github.com/new
2. Repository name: `elite-digital-clone`
3. Description: `Clone fiel elitedigital.pt (PrestaShop 8 + Warehouse) + Recondicionados ♻️ e Configurador 🛠️`
4. Escolha Public / Private
5. **NÃO** marque "Add a README"
6. Clique Create repository
7. No terminal local:

```bash
cd /home/user/elite-digital
git remote add origin https://github.com/SEU_USER/elite-digital-clone.git
git push -u origin main
```

## Opção B — via GitHub CLI

```bash
gh auth login
gh repo create elite-digital-clone --public --source=/home/user/elite-digital --remote=origin --push
```

## Link final a entregar

```
https://github.com/SEU_USER/elite-digital-clone
```

Substitua `SEU_USER` pelo seu username. O ZIP em `/home/user/elite-digital-clone.zip` contém o mesmo código caso prefira submeter como anexo.

## Verificação

- Homepage: `/`
- Recondicionados: `/recondicionados` → `recondicionados.html` (preview estático)
- Configurador: `/configurador` → `configurador.html`
