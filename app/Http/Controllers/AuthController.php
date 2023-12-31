<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function proseslogin(Request $request){
// dd($request);
         if(Auth::guard('karyawan')->attempt(['nik'=> $request->nik,'password'=>$request->password])){
            return redirect()->intended('/dashboard');
         }
         else {
             return redirect()->intended('/')->with(['peringatan'=>'Nik / Password Anda Salah']);
         }
    }

    public function proseslogout(Request $request){
        if(Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->logout();
            return redirect('/')->with(['berita'=>'Berhasil Log Out!']);
         }
    }
    public function prosesloginmanager(Request $request){

        if(Auth::guard('user')->attempt(['email'=> $request->email,'password'=>$request->password])){

            return redirect()->intended('/dashboardmanager');
        }
        else {
            return redirect()->intended('/panel')->with(['peringatan'=>'email / Password Anda Salah']);
        }
   }
   public function proseslogoutmanager(Request $request){
    if(Auth::guard('user')->check()){
      Auth::guard('user')->logout();
      return redirect('/panel');
   }
}
}
