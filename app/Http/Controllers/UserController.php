<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('Admin.usersList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], $messages);
        $data['active'] = isset($request['active']);
        $user = User::create($data);     
        $user->markEmailAsVerified();  
        return redirect('admin/usersList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('Admin.updateUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'name' => 'required|string',
            'userName' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], $messages);
        $data['active'] = isset($request['active']);
        User::where('id', $id)->update($data);        
        return redirect('admin/usersList');
    }
    
    public function messages()
    {
        return [
            'name.required' => 'FullName field is required',
            'name.string' => 'FullName must be string',
            'userName.required' => 'UserName field is required',
            'userName.string' => 'UserName must be string',
            'email.required' => 'Email field is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password field is required',
            'password.min' => 'Password must be at least 8 characters'
          ];
    }
}
