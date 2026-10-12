<?php
// modules/ps_pcconfigurator/ps_pcconfigurator.php — PrestaShop 8 module
if (!defined('_PS_VERSION_')) { exit; }

class Ps_PcConfigurator extends Module
{
    public function __construct()
    {
        $this->name = 'ps_pcconfigurator';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Elite Digital / Inforlândia';
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Configurador de PCs');
        $this->description = $this->l('PC builder com verificação de compatibilidade (socket, RAM, PSU watt, tamanho GPU) e cálculo live. Cria pack no carrinho.');
    }

    public function install(): bool
    {
        return parent::install()
            && $this->installSQL()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayTop')
            && $this->registerHook('actionFrontControllerSetMedia');
    }
    public function uninstall(): bool
    {
        return parent::uninstall() && Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'pc_component`, `'._DB_PREFIX_.'pc_build`');
    }
    private function installSQL(): bool
    {
        $sql = (string) file_get_contents(__DIR__ . '/sql/install.sql');
        $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
        // split statements
        $stmts = array_filter(array_map('trim', explode(';', $sql)));
        foreach ($stmts as $stmt) {
            if ($stmt === '') continue;
            if (!Db::getInstance()->execute($stmt)) return false;
        }
        return true;
    }

    public function hookDisplayTop()
    {
        return '<div class="alert alert-info" style="text-align:center;margin:0;border-radius:0;background:#111;color:#ffea00;border:0">🛠️ Novo! <a href="'.$this->context->link->getModuleLink($this->name,'configurator').'" style="color:#ffea00;text-decoration:underline">Configurador de PCs</a> — monte o seu gaming com compatibilidade garantida.</div>';
    }

    /**
     * Cria produto pack no carrinho a partir de build
     */
    public function addBuildToCart(int $idBuild, int $idCart): bool
    {
        $items = Db::getInstance()->executeS('SELECT id_component FROM `'._DB_PREFIX_.'pc_build_item` WHERE id_build='.(int)$idBuild);
        foreach ($items as $row) {
            // cada componente vira produto PrestaShop (id_product = id_component mapping)
            // simplificado: usa Cart::addProduct
            $cart = new Cart($idCart);
            $cart->updateQty(1, (int)$row['id_component']);
        }
        return true;
    }
}
