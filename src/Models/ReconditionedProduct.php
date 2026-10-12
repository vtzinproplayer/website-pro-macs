<?php
namespace EliteDigital\Models;

class ReconditionedProduct
{
    public static function gradeBadge(string $grade): array
    {
        return match($grade){
            'A+' => ['label'=>'Grade A+','class'=>'grade-Aplus','desc'=>'Como novo, sem marcas, 97%+ bateria'],
            'A'  => ['label'=>'Grade A','class'=>'grade-A','desc'=>'Micro-riscos <30cm, bateria 85%+'],
            'B'  => ['label'=>'Grade B','class'=>'grade-B','desc'=>'Desgaste leve, funcional 100%'],
            default => ['label'=>'Grade '.$grade,'class'=>'grade-B','desc'=>'Recondicionado certificado']
        };
    }

    public static function co2Saved(float $kg = 285): string
    {
        return "♻️ Poupou {$kg}kg CO₂ vs novo";
    }
}
