@extends('layouts.sign')

@section('contents')
    <section class="formsign">
        <div class="form-content">
            <h1 class="title">
                Masuk
            </h1>
            <div class="alertmsg">
                @if (session()->has('loginError'))
                    <div class="alertdanger">
                        {{ session('loginError') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alertsuccess">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="inputan">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autofocus>
                </div>
                <div class="inputan">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit">MASUK</button>
                <label for="info" id="info">Belum punya akun? <a href="/register">Daftar</a></label>
                <div class="back">
                    <a href="/"><i class='bx bx-left-arrow-alt'></i>Kembali</a>
                </div>
            </form>
        </div>
    </section>
@endsection
