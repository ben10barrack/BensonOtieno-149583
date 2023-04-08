<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Hash;
use Session;


class buyerController extends Controller
{
    public function index(){
        $buyers=Buyer::all();

        return view('buyer',['buyers'=>$buyers]);
        $data=array();
        if(Session::has('loginID')){
            $data=Buyer::where('id','=',Session::get('loginID'))->first();
        }
        return view('Buyer',compact('data',));

    }

    public function login(){
        return view("auth.buyerlogin");
    }

    public function store(Request $request ){
        $request-> validate([
            'name'=>'required',
            'email'=>'required|email|unique:buyer',
            'password'=>'required|min:5|max:12',
            'telephone'=>'required|min:10|max:10'
        ]);

        $buyer= new Buyer();
        $buyer->name=request('name');
        $buyer->email=request('email');
        $buyer->password=Hash::make(request('password'));
        $buyer->telephone=request('telephone');
        $res=$buyer-> save();

        if($res){
         return back()-> with('Success!','Registration Successful!');
        }else{
            return back()-> with('Failure!','Registration Failed!');
        }

        return redirect('/buyer',compact('buyer'));
    }
    public function loginUser(Request $request){
        $request-> validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $buyer=Buyer::where('email','=',$request->email)->first();
        if($buyer){
            if(Hash::check($request->password, $buyer->password)){
                $request->session()->put('loginID',$buyer->id);
                return redirect('buyer');
            }else{
            return back()-> with('Failure!','Invalid Credentials!');
            }

        }else{
            return back()-> with('Failure!','This Email is not registered!');
        }

    }
    public function logout(){
        if(Session::has('loginID')){
            Session::pull('loginID');
            return redirect('buyerlogin');
        }

    }
    public function EditB($id){
        $buyers=Buyer::where('id','=',$id)->first();
        return view('editbuyer',compact('buyers'));

    }
public function updateB(Request $request){
    $request-> validate([
        'name'=>'required',
        'email'=>'required',
        'telephone'=>'required|min:10|max:10'
    ]);

    $id=$request-> id;
    $name=$request-> name;
    $email=$request-> email;
    $password=$request-> passord;
    $telephone=$request-> telephone;

    Buyer::where('id','=',$id)->update([
        'name'=>$name,
        'email'=>$email,
        'telephone'=>$telephone
    ]);
    return back()-> with('Success!','Update successfull!');

}
public function deleteB($id){
    Buyer::where('id','=',$id)->delete();
    return back()-> with('Success!','Delete successfull!');
}

}
