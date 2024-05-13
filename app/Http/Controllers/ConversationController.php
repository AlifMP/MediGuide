<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'receiver_id' => 'required',
            'message' => 'required',
        ]);

        $conversation = new Conversation();
        $conversation->sender_id = auth()->user()->id;
        $conversation->receiver_id = $validatedData['receiver_id'];
        $conversation->message = $validatedData['message'];
        $conversation->save();

        // return back()->with('success', 'Message sent successfully.');
    }
}
