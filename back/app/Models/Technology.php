<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'technology_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(TechnologyCategory::class, 'technology_category_id');
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class, 'application_technology');
    }
}
