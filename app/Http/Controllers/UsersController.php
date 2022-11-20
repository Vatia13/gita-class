<?php

namespace App\Http\Controllers;

use App\Rules\AlphaSpace;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UsersController
{
    public $users;

    /**
     * Users constructor
     */
    public function __construct()
    {
        $this->users = collect(Http::get('https://jsonplaceholder.typicode.com/users')->json());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = [];
       foreach($this->users as $key=>$user){
        $users[$key] = $user;
        $users[$key]['errors'] = [];
        $validator = Validator::make($user, [
            'id' => ['required','integer'],
            'name' => ['required', new AlphaSpace],
            'username' => ['required',new AlphaSpace],
            'email' => ['required','email'],
            'address.street' => ['required'],
            'address.suite' => ['required'],
            'address.city' => ['required'],
            'address.zipcode' => ['required'],
            'address.geo.lat' => ['required'],
            'address.geo.lng' => ['required'],
            'phone' => ['required'],
            'website' => ['required'],
            'company.name' => ['required'],
            'company.catchPhrase' => ['required'],
            'company.bs' => ['required'],
        ]);
        if($validator->fails()){
            $users[$key]['errors'] = $validator->errors()->getMessages();
        }
       }

       return view('users.list',['users'=> $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->users->firstWhere('id',$id);
        return view('users.show',['user' => $user]);
    }
}
