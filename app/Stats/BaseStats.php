<?php

namespace App\Stats;

use Illuminate\Support\Str;

class BaseStats
{
    public static function get(){
        return (new static())->data();
    }

    public function getChartArray($dataSets, $labels): array
    {
        return [
            'datasets' => $dataSets,
            'labels' => $labels,
        ];
    }

    public function getHexColorForString($string)
    {
        return Str::of($string)->toHexColor();
    }
}
