<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable=[
        'depart_name',
        'slug'
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

}
