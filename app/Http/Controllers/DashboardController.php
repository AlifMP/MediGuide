<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Todolist;
use Illuminate\Support\Str;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function home()
    {
        // $articles = DB::table('health_information')->get();
        return view('dashboard.home', [
            'title' => 'Home - MediGuide',
            // 'articles' => $articles
        ]);
    }
    public function dochome()
    {
        // $articles = DB::table('health_information')->get();
        return view('doctor.home', [
            'title' => 'HomeDoctor - MediGuide',
            // 'articles' => $articles
        ]);
    }
    public function admindashboard()
    {
        $maxDoctorReplies = Conversation::select('receiver_id', DB::raw('SUM(doctor_replies_count) as total_replies'))
            ->groupBy('receiver_id')
            ->get();
        $maxReplies = optional($maxDoctorReplies)->total_replies ?? 0;
        return view('dashboard.adminhome', [
            'title' => 'Admin - MediGuide',
            'maxDoctorReplies' => $maxDoctorReplies,
            'maxReplies' => $maxReplies
        ]);
    }
    public function adminArticles()
    {
        $articles = DB::table('health_information')
            ->select('health_information.*', 'tags.name_tag')
            ->leftJoin('tag_info as tags', function ($join) {
                $join->on('health_information.tag_info', '=', 'tags.id')
                    ->whereRaw('tags.id = (SELECT MIN(id) FROM tag_info WHERE id = health_information.tag_info)');
            })
            ->get();
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
    public function addUsersPost(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "unique:users"],
            "email" => ["required", "email:dns", "unique:users", "email"],
            "role" => ["required"],
            "password" => ["required", "min:8"],
        ]);
        DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $request->session()->flash('addsuccess', 'User berhasil ditambahkan.');
        return redirect('/users');
    }
    public function editUsers($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('dashboard.editUser', [
            'title' => 'Edit User - MediGuide',
            "users" => $users
        ]);
    }
    public function editUsersPut(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email:dns", "email"],
            "role" => ["required"],
        ]);
        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        $request->session()->flash('updsuccess', 'Update User berhasil!');
        return redirect('/users');
    }
    public function deleteUsers($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/users');
    }

    public function addArticles()
    {
        $tags = DB::table('tag_info')->get();
        return view('dashboard.addArticles', [
            'title' => 'Add Article - MediGuide',
            "tags" => $tags
        ]);
    }
    public function addArticlesPost(Request $request)
    {
        $validated = $request->validate([
            "img_info" => ["required"],
            "title_info" => ["required"],
            "desc_info" => ["required"],
            // "tag_info" => ["required", "exists:tag_info,id"],
            "tag_info" => ["required"],
        ]);

        $slug = Str::slug($request->title_info, '-');

        $article = new Articles();
        $article->img_info = $request->img_info;
        $article->title_info = $request->title_info;
        $article->desc_info = $request->desc_info;
        $article->slug_info = $slug;
        $article->tag_info = $request->tag_info;
        $article->save();

        $request->session()->flash('addArtSuccess', 'Artikel berhasil ditambahkan.');
        return redirect('/articles');
    }
    public function editArticles($id)
    {
        $articles = DB::table('health_information')->where('id_info', $id)->get();
        $tags = DB::table('tag_info')->get();
        return view('dashboard.editArticles', [
            'title' => 'Edit Article - MediGuide',
            "tags" => $tags,
            'articles' => $articles
        ]);
    }
    public function editArticlesPut(Request $request)
    {
        $validated = $request->validate([
            "img_info" => ["required"],
            "title_info" => ["required"],
            "desc_info" => ["required"],
            // "tag_info" => ["required", "exists:tag_info,id"],
            "tag_info" => ["required"],
        ]);

        $slug = Str::slug($request->title_info, '-');

        DB::table('health_information')->where('id_info', $request->id_info)->update([
            'img_info' => $request->img_info,
            'title_info' => $request->title_info,
            'desc_info' => $request->desc_info,
            'slug_info' => $slug,
            'tag_info' => $request->tag_info
        ]);

        $request->session()->flash('editArtSuccess', 'Artikel berhasil diubah.');
        return redirect('/articles');
    }
    public function deleteArticles($id)
    {
        DB::table('health_information')->where('id_info', $id)->delete();
        return redirect('/articles');
    }
    public function profile()
    {
        $profil = DB::table('health_profile')->get();
        return view('dashboard.profile', [
            'title' => 'Profile - MediGuide',
            'profil' => $profil
        ]);
    }
    public function addprofile(Request $request)
    {
        return view('dashboard.addprofile', [
            'title' => 'Add Profile - MediGuide',
        ]);
    }
    public function addProfilePost()
    {
    }
    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        $articles = Articles::where('title_info', 'like', "%$query%")
            ->orWhereHas('tag', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name_tag', 'like', "%$query%");
            })
            ->get();

        return view('dashboard.adminSearch', [
            'articles' => $articles,
            'title' => 'Search Result'
        ]);
    }
}
