<?php

namespace App\Http\Controllers;
use App\Models\Register;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //create user
    public function index(){
        $users=Register::all();
       //dd($users);
       return view('index',compact('users'));
       }
   
      //store user
       public function store(Request $request)
       {
       //dd($request->all());
       $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone_number' => 'required',
        'state' => 'required',
        'country' => 'required'

       ]);
     
       Register::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           'phone_number' => $request->phone_number,
           'state' => $request->state,
           'country' => $request->country
       ]);
        
       return redirect()->route('user.index')->with('success','User has been registered'); 
       }

        //update user
        public function update(Request $request,Register $user)
        {
           // dd($request->all());
           $request->validate([
             'first_name' => 'required',
             'last_name' => 'required',
             'email' => 'required',
             'phone_number' => 'required',
             'state' => 'required',
             'country' => 'required'
     
            ]);
            
              $user->update([
                 'first_name' => $request->first_name,
                 'last_name' => $request->last_name,
                 'email' => $request->email,
                 'phone_number' => $request->phone_number,
                 'state' => $request->state,
                 'country' => $request->country
              ]);
              
              
            return redirect()->route('user.index')->with('success','User has been Updated'); 
        }
         //delete user
        public function destroy(Register $user)
        {
            $user->delete();
            return redirect()->route('user.index')->with('success','User has been deleted');
        }
}
