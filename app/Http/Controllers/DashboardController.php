<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.home', [
            'title' => 'Home',
        ]);
    }
}
