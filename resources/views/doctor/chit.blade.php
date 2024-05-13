@extends('layouts.doctorChat')

@section('contents')
    <section class="chat" id="chat">
        <div class="chat-contents">
            @foreach ($users as $user)
                <a href="{{ route('doctor.chat', $user->id) }}">{{ $user->name }}</a>
                <div class="contacts">
                    <img src="../assets/{{ $user->pfp }}" alt="">
                    <div class="info">
                        <h3>{{ $user->name }}</h3>
                        <p>Online</p>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
