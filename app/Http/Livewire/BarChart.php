<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BarChart extends Component
{
    public $chartId;
    public $views;
    public $article;

    public function render()
    {
        // return view('livewire.bar-chart');
        $articleByView = $this->getArticleByView();
        $this->article = $articleByView->pluck('title');
        $this->views = $articleByView->pluck('views');
        
       $this->emit("refreshChartData-{$this->chartId}", [
           'seriesData' => $this->views,
           'categories' => $this->article,
           'seriesName' => 'Most Popular Article',
       ]);
       
       return  view('administrators.dashboard');        
    }

    private function getArticleByView()
    {
        $query = DB::table('forums')
            ->select(
                // DB::raw('title as forum, views as No of Views')
                DB::raw('MONTH(created_at) AS month'),
                DB::raw(' AS No Of Forums'),
            )
            ->where('views', '>', 5)
            ->orderBy('views','DESC')
            ->take(5)
            ->get();

        // if ($this->bike > 0) {
        //     $query->where('bike_id', $this->bike);
        // }

        return $query;

    }
}
