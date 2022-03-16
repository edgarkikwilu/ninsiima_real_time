<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewChat;

use App\Models\User;

use Hash;

use PhpMqtt\Client\Facades\MQTT;

class ChatController extends Controller
{
    public function chat(Request $request){
        $request->validate([
            'message'=>'required|string',
            'image'=>'file'
        ]);

        // event(new NewChat($request->message,'Patient','https://picsum.photos/200/300'));
        MQTT::publish('topic/mqttx', $request->message);
        return response()->json(['message'=>'success']);
    }

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $token = $user->createToken('$request->token_name');
                return response()->json(['token' => $token->plainTextToken]);
            }else{
                return response()->json(['message'=>'invalid login credentials']);
            }
        }else{
            return response()->json(['message'=>'user not found']);
        }
    }
}
