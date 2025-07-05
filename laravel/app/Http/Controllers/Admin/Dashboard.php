<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
// use App\Models\Dashboard;
// use App\Models\Anggota;
// use App\Models\Keluarga;
// use App\Models\Konfigurasi;
// use Harisa;
use Session;

class Dashboard extends Controller
{
    
    public function __construct()
    {
        // Constructor can be empty or used for middleware
    }

    public function index(): View
    {   
        // Get settings with caching
        $settings = Cache::remember('admin.settings', 3600, function () {
            return Settings::getMultiple([
                'name', 'email', 'phone', 'whatsapp', 'facebook', 
                'instagram', 'linkedin', 'address_district', 'address_street', 
                'address_lat', 'address_lng'
            ]);
        });

        // Get dashboard statistics
        $stats = Cache::remember('admin.dashboard.stats', 1800, function () {
            return [
                'total_articles' => Articles::published()->count(),
                'recent_articles' => Articles::published()
                    ->orderBy('updated_at', 'desc')
                    ->limit(5)
                    ->get(),
            ];
        });

        return view('admin.dashboard.index', compact('settings', 'stats')); 
    }
}