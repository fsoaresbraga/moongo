<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function sendContatct(Request $request) {
            
        $validator = Validator::make($request->all(),[
            'nome' => 'required',
            'email' => 'email',
            'cidade' => 'required',
            'estado' => 'required',
            'telefone' => 'required',
            
        ]);

        if($validator->fails()){
            return response()->json(['status'=> 0, 'error'=>$validator->errors()->toArray()]);
        }
       
        return response()->json(['status'=> 200]);
        
        $contact = DB::table('contact')->insert(
            [
                'category' => $request['categoria'],
                'name' => $request['nome'],
                'email' => $request['email'],
                'city' => $request['cidade'],
                'state' => $request['estado'],
                'phone' => $request['telefone'],
                'created_at' => \Carbon\Carbon::now()->format('y-m-d H:i:s')
            ]
        );

        if($contact) {
            
            return response()->json(['status'=> 200]);
        }
        return response()->json(['status'=> 500]);
    }
}
