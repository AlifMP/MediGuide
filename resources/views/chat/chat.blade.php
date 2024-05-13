@extends('layouts.chatLay')

@section('contents')
    <section class="chat" id="chat">
        <div class="chat-contents">
            {{-- @foreach ($doc as $doct)
                <div class="contact">
                    <img src="../assets/{{ $doct->pfp }}" alt="">
                    <div class="info">
                        <h3>{{ $doct->name }}</h3>
                        <p>Online</p>
                    </div>
                </div>
                <hr>
                <form action="/storemessage" method="post">
                    @csrf
                    <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="receiver_id" value="{{ $doct->id }}">

                    @foreach ($showchat as $chats)
                        @if (Auth::user()->id == $chats->sender_id)
                            {{ $chats->message }}
                        @endif
                    @endforeach
                    <input type="text" name="message" placeholder="Type your message...">
                    <button type="submit">Send</button>
                </form>
            @endforeach --}}
            @foreach ($conversations as $conversation)
                <p>{{ $conversation->message }}</p>
            @endforeach

            <!-- Form untuk mengirim pesan -->
            <form action="{{ route('user.send.message') }}" method="post">
                @foreach ($doctor as $doct)
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $doct->id }}">
                    <input type="text" name="message" placeholder="Ketik pesan Anda...">
                    <button type="submit">Kirim</button>
                @endforeach
            </form>
        </div>
    </section>
@endsection
