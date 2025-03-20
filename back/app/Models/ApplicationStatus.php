<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
    ];

    /**
     * このステータスを持つ応募一覧
     */
    public function applications()
    {
        return $this->hasMany(Application::class, 'id');
    }
}
