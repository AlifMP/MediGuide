<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class userChatController extends Controller
{
    public function index()
    {
        $doctors = DB::table('users')->where('role', 'doctor')->get();
        return view('chat.index', ['title' => 'Chat Dokter', 'doctors' => $doctors]);
    }

    public function chat($id)
    {
        $doctor = DB::table('users')->where('id', $id)->get();
        $conversations = Conversation::where('sender_id', Auth::id())
            ->where('receiver_id', $id)
            ->orWhere('sender_id', $id)
            ->where('receiver_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();
        return view('chat.chat', ['title' => 'Chat Dokter', 'doctor' => $doctor, 'conversations' => $conversations]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required',
            'message' => 'required',
        ]);

        Conversation::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        return back();
    }
}
