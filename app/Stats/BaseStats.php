<?php

namespace App\Stats;

use Illuminate\Support\Str;

class BaseStats
{
    public function __construct()
    {
        return $this->get();
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
