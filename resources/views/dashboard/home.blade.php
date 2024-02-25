@extends('layouts.homeLay')

@section('contents')
    <section class="home" id="home">
        <div class="home-content">
            <h1 class="title">Panduan Kesehatan untuk Kehidupan yang Lebih Baik</h1>
            @guest
                <button onclick="location.href='/login'">Chat Dokter</button>
            @else
                <button id="chatbtn">Chat Dokter</button>
            @endguest
        </div>
    </section>
    <section class="top-info"></section>
@endsection
