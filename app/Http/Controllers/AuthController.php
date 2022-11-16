<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;


class AuthController extends Controller
{
   private $apiToken;
   public function __construct(){
      $this->apiToken = uniqid(base64_encode(Str::random(40)));
   }
   
   public function register(Request $req)
   {
      $data = $req->validate([
         'name' => 'required',
         'email' => 'required',
         'contact' => 'required',
         'password' => 'required'
      ]);
      $data['password'] = Hash::make($req->password);
      User::create($data);
      return response()->json($data, 200);
   }

   public function login(Request $req){
     $data = $req->only("email","password");
     if(Auth::attempt($data)){
      //  $success['token'] = $this-> apiToken;
       $success['name'] = Auth::user()->name;
       $success['msg'] = "login successfully";
     //$success['status'] = "true";
       return response()->json($success,200);
      }
     else{
      return response()->json(["status"=>false,'msg'=>'email and password incorrect']);
    }
   }
}
