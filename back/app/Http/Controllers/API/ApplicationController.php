<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    /**
     * 応募一覧を取得
     */
    public function index()
    {
        $applications = Application::with('company', 'status', 'technologies', 'aspirationLevel')->orderBy('created_at', 'desc')->get();
        Log::info($applications);
        return response()->json($applications);
    }
}
