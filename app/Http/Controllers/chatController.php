<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chatController extends Controller
{
    public function index()
    {
        $doc = DB::table('users')->where('role', 'doctor')->get();
        return view('chat.index', [
            'title' => 'Chat - MediGuide',
            'doc' => $doc
        ]);
    }
    public function getDoctor($id)
    {
        $showchat = DB::table('conversations')->where('receiver_id', $id)->get();
        $doc = DB::table('users')->where('id', $id)->get();
        return view('chat.chat', [
            'title' => 'Chat - MediGuide',
            'doc' => $doc,
            'showchat' => $showchat
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required',
        ]);

        DB::table('conversations')->insert([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);
        return back();
    }
    public function indexdoc()
    {
        // $doc = DB::table('users')->where('role', 'user')->get();
        // $receiver = DB::table('conversations')
        //     ->select('conversations.*', 'user.id')
        //     ->leftJoin('users as user', function ($join) {
        //         $join->on('conversations.receiver_id', '=', 'user.id')
        //             ->whereRaw('user.id = (SELECT MIN(id) FROM users WHERE id = conversations.receiver_id)');
        //     })
        //     ->get();
        return view('doctor.chit', [
            'title' => 'Chat - MediGuide',
            'receiver' => $receiver
        ]);
    }
    public function getKlien($id)
    {
        $showchat = DB::table('conversations')->where('receiver_id', $id)->get();
        $doc = DB::table('users')->where('id', $id)->get();
        return view('doctor.chat', [
            'title' => 'Chat - MediGuide',
            'doc' => $doc,
            'showchat' => $showchat
        ]);
    }
    public function storedoc(Request $request)
    {
        $validatedData = $request->validate([
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required',
        ]);

        DB::table('conversations')->insert([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);
        return back();
    }
}
