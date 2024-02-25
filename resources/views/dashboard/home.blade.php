@extends('layouts.homeLay')

@section('contents')
    <section class="home" id="home">
        <div class="home-content">
            <h1 class="title">Selamat Datang di MediGuide!</h1>
            <p class="desc">Dapatkan panduan kesehatan terpercaya dan relevan untuk membimbing Anda melalui setiap langkah
                hidup sehat.</p>
        </div>
        <div class="home-card">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2>Artikel Kesehatan</h2>
                    </div>
                    <div class="card-body">
                        <p>Dapatkan informasi kesehatan terbaru dan terpercaya dari para ahli.</p>
                        <a href="#" class="card-link">Baca Artikel ></a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Chat dengan Dokter</h2>
                    </div>
                    <div class="card-body">
                        <p>Konsultasikan masalah kesehatan Anda langsung dengan dokter kami.</p>
                        <a href="#" class="card-link">Chat Sekarang ></a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Riwayat Kesehatan</h2>
                    </div>
                    <div class="card-body">
                        <p>Kelola riwayat kesehatan Anda dengan mudah dan aman.</p>
                        <a href="#" class="card-link">Lihat Riwayat ></a>
                    </div>
                </div>
            </div>
    </section>
@endsection
