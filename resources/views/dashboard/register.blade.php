@extends('layouts.sign')

@section('contents')
    <section class="formsign">
        <div class="form-content">
            <h1 class="title">Daftar</h1>
            <form action="/register" method="post">
                @csrf
                <div class="inputan">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="inputan">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="inputan">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit">DAFTAR</button>
                <label for="register">Sudah punya akun? <a href="/login">Masuk</a></label>
            </form>
        </div>
    </section>
@endsection
