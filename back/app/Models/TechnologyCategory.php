<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * この技術カテゴリに属する技術一覧
     */
    public function technologies()
    {
        return $this->hasMany(Technology::class, 'technology_category_id');
    }
}
