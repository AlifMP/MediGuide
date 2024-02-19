@extends('layouts.sign')

@section('contents')
    <section class="formsign">
        <div class="form-content">
            <h1 class="title">Masuk</h1>
            <form action="/login" method="post">
                @csrf
                <div class="inputan">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="inputan">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit">MASUK</button>
                <label for="register">Belum punya akun? <a href="/register">Daftar</a></label>
            </form>
        </div>
    </section>
@endsection
