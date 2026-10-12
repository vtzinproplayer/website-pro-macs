<?php
if (!defined('_PS_VERSION_')) { exit; }
class Ps_Ai_Assistant extends Module {
    public function __construct(){
        $this->name='ps_ai_assistant';
        $this->tab='front_office_features';
        $this->version='1.0.0';
        $this->author='Elite Digital / Inforlândia';
        $this->ps_versions_compliancy=['min'=>'8.0.0','max'=>_PS_VERSION_];
        $this->bootstrap=true;
        parent::__construct();
        $this->displayName=$this->l('Assistente AI Elite');
        $this->description=$this->l('Chat AI que guia clientes inexperientes a escolher PC/novo vs recondicionado, explica sem jargão e valida compatibilidade + montagem. Integrado ao catálogo recondicionados.');
    }
    public function install(): bool {
        return parent::install()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayTop')
            && $this->registerHook('actionFrontControllerSetMedia');
    }
    public function hookDisplayTop(){
        return '<div style="background:#111;color:#ffea00;text-align:center;padding:6px;font-size:12px">✨ Novo! <a href="'.$this->context->link->getModuleLink($this->name,'assistant').'" style="color:#ffea00;text-decoration:underline">Assistente AI Elite</a> — diga “quero PC até 700€” e ela monta para si, mesmo sem perceber nada.</div>';
    }
}
