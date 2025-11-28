<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function register(Request $req){
        $data = $req->validate(['name'=>'required','email'=>'required|email','password'=>'required']);
        $user = User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password'])]);
        return response()->json(['token'=>$user->createToken('api')->plainTextToken],201);
    }
    public function login(Request $req){
        $data = $req->validate(['email'=>'required','password'=>'required']);
        $user = User::where('email',$data['email'])->first();
        if(!$user || !Hash::check($data['password'],$user->password)) return response()->json(['message'=>'Invalid'],401);
        return response()->json(['token'=>$user->createToken('api')->plainTextToken]);
    }
}
