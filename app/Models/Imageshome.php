<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageshome extends Model
{
    use HasFactory;
    // Image.php

    protected $fillable = [
        // Add other fillable properties here, if any
        'filename',
        'original_name',
    ];



    public function home()
    {
        return $this->belongsTo(Home::class);
    }
}
