<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApexCharts extends Component
{
    public string $chartId;
    public $seriesData;
    public $categories;
    public $seriesName;

    public function __construct($chartId, $seriesData, $categories, $seriesName = '')
    {
        $this->chartId = $chartId;
        $this->seriesData = $seriesData;
        $this->categories = $categories;
        $this->seriesName = $seriesName ?? 'Series';
    }

    public function render()
    {
        return view('components.livewire.apex-charts');

    }
}
