@extends('layouts.doctorLay')

@section('contents')
    <section class="home" id="home">
        <div class="home-content">
            <h1 class="title">Selamat Datang di MediGuide!</h1>
            <p class="desc">Dapatkan panduan kesehatan terpercaya dan relevan untuk membimbing Anda melalui setiap langkah
                hidup sehat.</p>
            @guest
                <button class="btn-more" onclick="location.href='/login'">Selengkapnya</button>
            @else
                <button class="btn-more" onclick="location.href='/blogsdoc'">Info Kesehatan</button>
                <button class="btn-more" onclick="location.href='/chats'">Chat Klien</button>
            @endguest
        </div>
    </section>
    {{-- <section class="article" id="article">
        <div class="article-content">
            <div class="top">
                <h1 class="title">Ikuti artikel & berita terkini</h1>
                <button>Selengkapnya</button>
            </div>
            <div class="article-list">
                @foreach ($articles as $article)
                    <div class="article-card">
                        <div class="article-image">
                            <img src="{{ $article->img_info }}" alt="image-article">
                        </div>
                        <div class="article-text">
                            <h4>{{ $article->title_info }}</h4>
                            <p>{{ $article->desc_info }}</p>
                        </div>
                        <div class="timestamp">
                            <p>{{ $article->created_at }}</p>
                        </div>
                        <div class="article-more"><button>Selengkapnya</button></div>
                    </div>
                    <div class="article-card">
                        <div class="article-image">
                            <img src="{{ $article->img_info }}" alt="image-article">
                        </div>
                        <div class="article-text">
                            <h4>{{ $article->title_info }}</h4>
                            <p>{{ $article->desc_info }}</p>
                        </div>
                        <div class="timestamp">
                            <p>{{ $article->created_at }}</p>
                        </div>
                        <div class="article-more"><button>Selengkapnya</button></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
@endsection
