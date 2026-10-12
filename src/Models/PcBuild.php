<?php
namespace EliteDigital\Models;

/**
 * PcBuild — validação de compatibilidade para o Configurador
 * Mesma lógica usada no JS (public/assets/js/app.js) e no PHP (API + back-office)
 */
class PcBuild
{
    public array $components = []; // ['cpu'=>id, 'motherboard'=>id, ...]
    public array $catalog = []; // injected from DB

    public function __construct(array $components = [], array $catalog = [])
    {
        $this->components = $components;
        $this->catalog = $catalog;
    }

    public function validate(): array
    {
        $warnings = [];
        $watt = 0;

        $cpu = $this->get('cpu');
        $mb  = $this->get('motherboard');
        $ram = $this->get('ram');
        $gpu = $this->get('gpu');
        $case = $this->get('case');
        $psu = $this->get('psu');

        // watt
        foreach (['cpu','gpu','ram','storage'] as $cat) {
            $c = $this->get($cat);
            if ($c && isset($c['watt_tdp'])) $watt += (int)$c['watt_tdp'];
        }

        // socket
        if ($cpu && $mb && ($cpu['socket'] ?? null) !== ($mb['socket'] ?? null)) {
            $warnings[] = "Incompatibilidade de socket: CPU {$cpu['socket']} vs Placa-mãe {$mb['socket']}";
        }
        // RAM type
        if ($mb && $ram && ($mb['ram_type'] ?? null) !== ($ram['ram_type'] ?? null)) {
            $warnings[] = "RAM incompatível: board exige {$mb['ram_type']}, selecionou {$ram['ram_type']}";
        }
        // GPU length vs case
        if ($gpu && $case) {
            $gpuLen = (int)($gpu['length_mm'] ?? 0);
            $caseMax = (int)($case['length_mm'] ?? 999);
            if ($gpuLen && $caseMax && $gpuLen > $caseMax) {
                $warnings[] = "GPU com {$gpuLen}mm não cabe na caixa (máx {$caseMax}mm)";
            }
        }
        // PSU watt
        $needed = (int)ceil($watt * 1.3);
        $psuWatt = $psu ? (int)($psu['watt_tdp'] ?? 0) : 0;
        if ($psuWatt && $psuWatt < $needed) {
            $warnings[] = "Fonte insuficiente: precisa ~{$needed}W, selecionou {$psuWatt}W";
        }

        $compatible = empty($warnings);
        return ['compatible'=>$compatible, 'warnings'=>$warnings, 'watt'=>$watt, 'needed'=>$needed];
    }

    private function get(string $category): ?array
    {
        $id = $this->components[$category] ?? null;
        if (!$id) return null;
        foreach ($this->catalog as $row) {
            if (($row['id_component'] ?? $row['id'] ?? null) == $id) return $row;
        }
        // fallback: if components is already resolved object
        if (is_array($id) && isset($id['category'])) return $id;
        return null;
    }

    public function totalPrice(): float
    {
        $total = 0.0;
        foreach ($this->components as $cat => $id) {
            $c = $this->get($cat);
            if ($c) $total += (float)($c['price'] ?? 0);
        }
        return round($total,2);
    }

    public function hash(): string
    {
        return 'CFG-'.date('Y').'-'.strtoupper(substr(md5(json_encode($this->components)),0,6));
    }
}
