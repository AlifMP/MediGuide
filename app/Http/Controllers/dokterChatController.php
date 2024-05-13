<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dokterChatController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('role', 'user')->get();
        return view('doctor.chit', ['title' => 'Chat Klien', 'users' => $users]);
    }

    public function chat($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        $conversations = Conversation::where('sender_id', $id)
            ->where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())
            ->where('receiver_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('doctor.chat', ['title' => 'Chat Klien', 'users' => $users, 'conversations' => $conversations]);
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

        Conversation::where('sender_id', $request->receiver_id)
            ->where('receiver_id', Auth::id())
            ->increment('doctor_replies_count');

        return back();
    }
}
