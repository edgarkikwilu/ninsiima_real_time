<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewChat;

class ChatController extends Controller
{
    public function chat(Request $request){
        $request->validate([
            'message'=>'required|string',
            'image'=>'file'
        ]);

        event(new NewChat($request->message,'Patient','https://picsum.photos/200/300'));
        return response()->json(['message'=>'success']);
    }
}
