@extends('layouts.adminLay')

@section('contents')
    <section class="articles" id="articles">
        <div class="articles-content">
            <h1 class="title">Search Results</h1>
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
                        <td>{{ $article->id_info }}</td>
                        <td><img src="../assets/{{ $article->img_info }}" alt="image-of-article"></td>
                        <td>{{ $article->title_info }}</td>
                        <td>{{ $article->desc_info }}</td>
                        <td>{{ $article->slug_info }}</td>
                        <td>{{ $article->tag->name_tag }}</td>
                        <td>{{ $article->created_at }}</td>
                        <td><a href="/edit/{{ $article->id_info }}">Edit</a> | <a href="/delete/{{ $article->id_info }}"
                                onclick="return confirm('Are you sure you want to delete this data?');">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
