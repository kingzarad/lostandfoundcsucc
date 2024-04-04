<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Inquiry;
use App\Models\Items;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    {

        return response()->view('admin.dashboard', [
            'items_total' => Items::where('published', 'Published')->count(),
        
            'items_lost_found' => Items::where('purpose', 'lost')->where('status', 'found')->count(),
            'items_lost_notfound' => Items::where('purpose', 'lost')->where('status', 'notfound')->count(),
            'items_found_claimed' => Items::where('purpose', 'found')->where('status', 'claimed')->count(),
            'items_found_unclaimed' => Items::where('purpose', 'found')->where('status', 'unclaimed')->count(),
            'inquery_total' => Inquiry::count(),
            'category_total' => Categories::count()
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }
}
