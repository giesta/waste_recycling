<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Invoice;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
      $users = User::all();
      Session::forget('time');
      Session::put('time', now());      
      return view('layouts/contact', compact('users'));
    }
    public function send(Request $request)
    {
        Session::put($request->all());
        
      return view('layouts/contact');
    }
    public function create()
    {
      return view('layouts/createContact');
    }
    public function insertUser(Request $request)
    {
        $validator = Validator::make(
            [   'name' =>$request->input('name'),
                'last_name' =>$request->input('last_name'),
                'email' =>$request->input('email')
            ],
            [   'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $user = new User();
            $user->name  = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');

            $user->save();
        }
        return Redirect::to('/contact')->with('success', 'Darbuotojas pridėtas');
    }
    public function deleteUser($id)
    {
       
        $invoices = Invoice::where('user_id', $id)->get();
        foreach($invoices as $invoice){
          $invoice->lines()->delete();
          $invoice->delete();
        }
        User::find($id)->delete();

        return Redirect::to('/contact ')->with('success', 'Darbuotojas pašalintas');
    }
    public function editUser($id)
    {
        $selectedUser = User::find($id);        
        return view('layouts/editContact', compact('selectedUser'));
    }
    public function confirmEditUser(Request $request, $id)
    {
      $validator = Validator::make(
        ['name' =>$request->input('name'),
        'last_name' =>$request->input('last_name'),
        'email' =>$request->input('email')
        ],
        ['name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email'
        ]
    );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
          $user = User::find($id);
          $user->name  = $request->input('name');
          $user->last_name = $request->input('last_name');
          $user->email = $request->input('email');

          $user->save();
        }
        return Redirect::to('/contact')->with('success', 'Informacija atnaujinta');
    }
}
