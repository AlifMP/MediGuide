@extends('layouts.adminLay')

@section('contents')
    <section class="articles" id="articles">
        <div class="articles-content">
            <h1 class="title">Data Articles</h1>
            @if (session()->has('addArtSuccess'))
                <div class="alert alert-success" role="alert">
                    {{ session('addArtSuccess') }}
                </div>
            @endif
            @if (session()->has('editArtSuccess'))
                <div class="alert alert-success" role="alert">
                    {{ session('editArtSuccess') }}
                </div>
            @endif
            <form action="{{ route('articles.search') }}" method="GET">
                <input type="text" name="query" placeholder="Search articles by title or tag..."
                    style="width: 50%; height:40px; border-radius:5px; outline:none; border: 2px solid #001b6667; padding:8px;">
                <button type="submit">Search</button>
            </form>
            <button onclick="location.href='/addarticle'">New Article</button>
            <?php
            $i = 1;
            ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Images</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Tag</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="../assets/{{ $article->img_info }}" alt="image-of-article"></td>
                        <td>{{ $article->title_info }}</td>
                        <td>{{ $article->desc_info }}</td>
                        <td>{{ $article->slug_info }}</td>
                        <td>{{ $article->name_tag }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td><a href="/edit/{{ $article->id_info }}">Edit</a> | <a href="/delete/{{ $article->id_info }}"
                                onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
