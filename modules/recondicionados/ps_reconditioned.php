<?php
// modules/ps_reconditioned/ps_reconditioned.php — PrestaShop 8 module
if (!defined('_PS_VERSION_')) { exit; }

class Ps_Reconditioned extends Module
{
    public function __construct()
    {
        $this->name = 'ps_reconditioned';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Elite Digital / Inforlândia';
        $this->ps_versions_compliancy = ['min' => '8.0.0', 'max' => _PS_VERSION_];
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('Computadores Recondicionados');
        $this->description = $this->l('Catálogo dedicado a equipamentos recondicionados com grades A+/A/B, garantia e selo sustentável. Integra Warehouse.');
        $this->confirmUninstall = $this->l('Tem a certeza?');
    }

    public function install(): bool
    {
        return parent::install()
            && $this->installSQL()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayProductAdditionalInfo')
            && $this->registerHook('actionAdminControllerSetMedia');
    }

    public function uninstall(): bool
    {
        return parent::uninstall() && $this->uninstallSQL();
    }

    private function installSQL(): bool
    {
        $sql = (string) file_get_contents(__DIR__ . '/sql/install.sql');
        $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
        return (bool) Db::getInstance()->execute($sql);
    }
    private function uninstallSQL(): bool
    {
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'reconditioned_product`');
    }

    public function hookDisplayProductAdditionalInfo($params)
    {
        $id = (int) $params['product']->id;
        $row = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'reconditioned_product` WHERE id_product='.(int)$id);
        if (!$row) return '';
        $this->context->smarty->assign('rc', $row);
        return $this->display(__FILE__, 'views/templates/hook/badge.tpl');
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminReconditioned'));
    }
}
