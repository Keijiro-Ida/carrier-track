<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;
use App\Models\ApplicationStatus;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'technology_id',
        'aspiration_level_id',
        'status_id',
        'comment',
    ];

    /**
     * 企業とのリレーション
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * ステータスとのリレーション
     */
    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }

    /**
     * 技術とのリレーション
     */
    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'application_technology');
    }

    /**
     * 志望度とのリレーション
     */
    public function aspirationLevel()
    {
        return $this->belongsTo(AspirationLevel::class, 'aspiration_level_id');
    }

}
