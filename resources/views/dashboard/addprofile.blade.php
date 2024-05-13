@extends('layouts.profile')

@section('contents')
    <section class="profile" id="profile">
        <div class="profile-content">
            <h1 class="title">Profil Kesehatan</h1>
            <form action="/addprofile" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="inputan">
                    <label for="height"></label>
                    <input type="text" name="height" autofocus required>
                </div>
                <div class="inputan">
                    <label for="blood_type"></label>
                    <input type="text" name="blood_type" autofocus required>
                </div>
                <div class="inputan">
                    <label for="weight"></label>
                    <input type="text" name="weight" autofocus required>
                </div>
                <div class="inputan">
                    <label for="allergies"></label>
                    <input type="text" name="allergies" autofocus required>
                </div>
                <div class="inputan">
                    <label for="medical_conditions"></label>
                    <input type="text" name="medical_conditions" autofocus required>
                </div>

                <button type="submit">Tambah</button>
            </form>
        </div>
    </section>
@endsection
