@extends('layouts.sign')

@section('contents')
    <section class="formsign">
        <div class="form-content">
            <h1 class="title">Daftar</h1>
            <form action="/register" method="post">
                @csrf
                <div class="inputan">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" id="name" autofocus required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feed">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="inputan">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feed">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="inputan">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <div class="invalid-feed">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit">DAFTAR</button>
                <label for="info" id="info">Sudah punya akun? <a href="/login">Masuk</a></label>
                <div class="back">
                    <a href="/"><i class='bx bx-left-arrow-alt'></i>Kembali</a>
                </div>
            </form>
        </div>
    </section>
@endsection
