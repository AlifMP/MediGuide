<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home()
    {
        $articles = DB::table('health_information')->get();
        return view('dashboard.home', [
            'title' => 'Home - MediGuide',
            'articles' => $articles
        ]);
    }
    public function admindashboard()
    {
        return view('dashboard.adminhome', [
            'title' => 'Admin - MediGuide',
        ]);
    }
    public function adminArticles()
    {
        $articles = DB::table('health_information')->get();
        return view('dashboard.adminArticles', [
            'title' => 'Data Articles - MediGuide',
            'articles' => $articles
        ]);
    }
    public function adminUsers()
    {
        $users = DB::table('users')->get();
        return view('dashboard.adminUsers', [
            'title' => 'Data Users - MediGuide',
            'users' => $users
        ]);
    }
    public function addUsers()
    {
        return view('dashboard.addUser', [
            'title' => 'Add User - MediGuide',
        ]);
    }
    public function addUsersPost()
    {
    }
}
