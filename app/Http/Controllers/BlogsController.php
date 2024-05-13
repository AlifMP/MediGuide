<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    public function index()
    {

        $articles = DB::table('health_information')
            ->select('health_information.*', 'tags.name_tag')
            ->leftJoin('tag_info as tags', function ($join) {
                $join->on('health_information.tag_info', '=', 'tags.id')
                    ->whereRaw('tags.id = (SELECT MIN(id) FROM tag_info WHERE id = health_information.tag_info)');
            })
            ->get();
        $tags = DB::table('tag_info')->get();
        return view('blogs.artikel', [
            "title" => "Info Kesehatan - MediGuide",
            "articles" => $articles,
            "tags" => $tags
        ]);
    }
    public function search(Request $request)
    {
        $artikelcari = Articles::where('title_info', 'like', "%" . request('query') . "%")->get();
        $tags = DB::table('tag_info')->get();

        return view('blogs.artikel', ['artikelcari' => $artikelcari, 'tags' => $tags]);
    }

    public function detail($slug)
    {
        $detailArticles = Articles::where('slug_info', $slug)->get();

        return view('blogs.detail', [
            "title" => "Info Kesehatan - MediGuide",
            "detailArticles" => $detailArticles
        ]);
    }
    public function indexdoc()
    {
        $articles = DB::table('health_information')
            ->select('health_information.*', 'tags.name_tag')
            ->leftJoin('tag_info as tags', function ($join) {
                $join->on('health_information.tag_info', '=', 'tags.id')
                    ->whereRaw('tags.id = (SELECT MIN(id) FROM tag_info WHERE id = health_information.tag_info)');
            })
            ->get();
        $tags = DB::table('tag_info')->get();
        return view('doctor.artikel', [
            "title" => "Info Kesehatan - MediGuide",
            "articles" => $articles,
            "tags" => $tags
        ]);
    }
    public function detaildoc($slug)
    {
        $detailArticles = Articles::where('slug_info', $slug)->get();

        return view('doctor.detailArtikel', [
            "title" => "Info Kesehatan - MediGuide",
            "detailArticles" => $detailArticles
        ]);
    }
}
