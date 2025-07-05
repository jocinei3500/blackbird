<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardConfig;

class DashboardConfigController extends Controller
{
    public function produtos()
    {
        $product = DashboardConfig::all();
        return view('app.config.dashboard-config', ['produtos' => $product]);
    }


}
