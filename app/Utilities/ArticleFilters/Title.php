<?php

namespace App\Utilities\ArticleFilters;

use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;

class Title extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->where('title', $value);
    }
}