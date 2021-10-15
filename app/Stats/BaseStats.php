<?php

namespace App\Stats;

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
}
