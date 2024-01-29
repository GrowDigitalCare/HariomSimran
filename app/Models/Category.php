<?php

namespace App\Models;

use App\Models\TempleHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'title',
      'slug',

    ];

    public function templeHistories()
    {
        return $this->hasMany(TempleHistory::class);
    }
}
