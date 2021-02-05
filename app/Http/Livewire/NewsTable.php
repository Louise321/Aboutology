<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;

class NewsTable extends Component
{
    use WithPagination;

    // public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    
    public function render()
    {
        return view('livewire.news-table', [
            'news' => News::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate(10),
        ]);
    }
     
}
