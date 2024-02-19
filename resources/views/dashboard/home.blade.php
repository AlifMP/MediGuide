@extends('layouts.homeLay')

@section('contents')
    <section class="home" id="home">
        <div class="home-content">
            <h1 class="title">Panduan Kesehatan untuk Kehidupan yang Lebih Baik</h1>
            @guest
                <button onclick="location.href='/login'">Chat Dokter</button>
            @else
                <button>Chat Dokter</button>
            @endguest
        </div>
    </section>
@endsection
