<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'category_id',
        'link',
        'name',
        'note',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
