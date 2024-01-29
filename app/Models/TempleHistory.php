<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TempleHistory extends Model
{
    use HasFactory;
    protected $table = "temple_histories";
  
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'image',
        'slug',
        'videourl',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
