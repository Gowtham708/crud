<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;
use Session;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Jobs\SentEmailJob;
use App\Jobs\SentEmails;

class ValidationController extends Controller
{
    //
   public function _construct(Page $user){
      $this->user = $user;
   }

   public function login(){
       return view('login');
   }

   public function loginForm(Request $request){
       //validate
       $this->validate($request,array(
       'email' => 'required',
       'password' => 'required'
      ));
    //   dd($request->all());
    $user = Page::where('email',$request->email)->first();
    if (Hash::check($request->password, $user->password)) {
        // dd($user);

        return redirect()->route('user.index')->with('success','Login Successfully');

    }else{
        return back()->with('error','Invalid Login Credentials');
     }   
   }
    
   public function forgot(){
       return view('forgot');
   }

   public function sentemail(){
        return view('/sentemail');
   }

   public function logout(){
       Session::flush();
       return redirect('login');
   }

   public function setpassword(Request $request){
      
     $user = Page::where('email',$request->email)->first();
     //dd($user);
     return view('/newpassword',compact('user'));
   }

   public function forgotpassword(Request $request){
    
    $user = Page::where('email',$request->email)->first();

      //dd($user);
    if(isset($user)){
        $details = new SentEmailJob($request->all());
       // dd($details);
        dispatch($details);
        return redirect('/sent')->with('success','Login successfully');
    }else{
        return back()->with('error','Invalid Login credentials');
    }
 }

   public function newpassword(Request $request){
    //validate
    $this->validate($request,[
        'current_password' => 'required',
       'new_password' => 'required|same:confirm_password',
       'confirm_password' => 'required'
    ]);
      //$password = $request->new_password;
     
      //dd($request->email);
    
    $user = Page::where('email',$request->email)->first();
    //dd($user);
    if (!Hash::check($request->current_password, $user->password)) { 
       return back()->with('error'.'current password does not match');
    }

    $user->password = \Hash::make($request->new_password);
    $user->save();
 
    $request->session()->flash('success', 'Password changed');
    return redirect('/login');

}
}