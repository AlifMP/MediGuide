@extends('layouts.chatLay')

@section('contents')
    <section class="chat" id="chat">
        <div class="chat-contents">
            @foreach ($doctors as $doctor)
                <a href="{{ route('user.chat', $doctor->id) }}">{{ $doctor->name }}</a>
                <div class="contacts">
                    <img src="../assets/{{ $doctor->pfp }}" alt="">
                    <div class="info">
                        <h3>{{ $doctor->name }}</h3>
                        <p>Online</p>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
