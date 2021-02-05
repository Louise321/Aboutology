<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Profile extends Model
{
    protected $table = 'profiles';
    public $timestamps = true;

    use HasFactory;
    use LogsActivity;

    protected static $logAttributes = ['name', 'text'];

}
