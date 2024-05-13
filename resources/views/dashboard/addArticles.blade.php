@extends('layouts.adminLay')

@section('contents')
    <section class="articles" id="articles">
        <div class="articles-content">
            <h1 class="title">New Article</h1>
            <form action="/addarticle" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="title_info" class="form-control" id="floatingInput" placeholder="judul artikel"
                        required autofocus>
                    <label for="floatingInput">Judul Artikel</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="desc_info" class="form-control" id="floatingInput" placeholder="isi artikel"
                        required>
                    <label for="floatingInput">Isi Artikel</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="tag_info" id="floatingSelect"
                        aria-label="Floating label select example">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" selected>{{ $tag->name_tag }}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Kategori Artikel</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Gambar Artikel</label>
                    <input class="form-control" name="img_info" type="file" id="formFile" required>
                </div>

                <div class="btnn">
                    <a href="/articles">Cancel</a>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
