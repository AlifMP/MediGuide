@extends('layouts.adminLay')

@section('contents')
    <section class="home" id="home">
        <div class="home-content">
            <h1 class="title">Admin Dashboard</h1>
            @foreach ($maxDoctorReplies as $reply)
                <p>Jumlah Balasan Dokter Terbanyak: {{ $reply->total_replies }}</p>
            @endforeach
        </div>
    </section>
@endsection
