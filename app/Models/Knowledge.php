<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Knowledge extends Model
{
    // search($query)
    // {
    //     $search_text = $_GET['query'];
    //     $content = Knowledge::where('title', 'LIKE', '%' .$search_text. '%') -> get();

    //     return view('user.knowledge', compact('content'));
    // }

    use HasFactory;
    use LogsActivity;
    protected $fillable = [
        'title', 'category','description', 'eventDate'
    ];

    protected static $logAttributes = ['name', 'text'];

}
