<?php
use PHPUnit\Framework\TestCase;
use EliteDigital\Models\PcBuild;

final class PcBuildTest extends TestCase {
    public function testSocketMismatch(): void {
        $catalog = [
            ['id_component'=>1,'category'=>'cpu','socket'=>'LGA1700','price'=>100],
            ['id_component'=>2,'category'=>'motherboard','socket'=>'AM5','price'=>100],
        ];
        $build = new PcBuild(['cpu'=>1,'motherboard'=>2], $catalog);
        $r = $build->validate();
        $this->assertFalse($r['compatible']);
        $this->assertStringContainsString('socket', strtolower($r['warnings'][0]));
    }
    public function testCompatible(): void {
        $catalog = [
            ['id_component'=>1,'category'=>'cpu','socket'=>'AM5','watt_tdp'=>65,'price'=>100],
            ['id_component'=>2,'category'=>'motherboard','socket'=>'AM5','ram_type'=>'DDR5','price'=>100],
            ['id_component'=>3,'category'=>'ram','ram_type'=>'DDR5','price'=>50],
            ['id_component'=>4,'category'=>'psu','watt_tdp'=>650,'price'=>80],
            ['id_component'=>5,'category'=>'gpu','watt_tdp'=>115,'length_mm'=>227,'price'=>300],
            ['id_component'=>6,'category'=>'case','length_mm'=>360,'price'=>90],
        ];
        $build = new PcBuild(['cpu'=>1,'motherboard'=>2,'ram'=>3,'psu'=>4,'gpu'=>5,'case'=>6], $catalog);
        $r = $build->validate();
        $this->assertTrue($r['compatible']);
    }
}
