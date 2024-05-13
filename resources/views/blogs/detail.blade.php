@extends('layouts.detailblogLay')

@section('contents')
    <section class="artikel" id="artikel">
        @foreach ($detailArticles as $details)
            <div class="left-side">
                <h3>Kategori</h3>
                <ul>
                    <li><a href="#">Kategori 1</a></li>
                    <li><a href="#">Kategori 2</a></li>
                    <li><a href="#">Kategori 3</a></li>
                </ul>
                <a href="/blogs">Back</a>
            </div>
            <div class="middle-side">
                <h1>{{ $details->title_info }}</h1>
                <p>{{ $details->desc_info }}</p>
            </div>
            <div class="right-side">
                <h3>Artikel Direkomendasikan</h3>
                <div class="share-buttons">
                    <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
                    <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
                </div>
            </div>
        @endforeach
    </section>
@endsection
