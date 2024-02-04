<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Mail\Message;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::get();
        return view('Admin.messagesList', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function contact(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',         
            'message' => 'required|string'
        ]);
        Contact::create($data);
        Mail::to('alaaelhadi@gmail.com')->send(new ContactMail($data));
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message, string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['unread' => 1]);
        return view('Admin.showMessage', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect('admin/messagesList');
    }

    public function messages()
    {
        return [
            'firstName.required' => 'First Name field is required',
            'firstName.string' => 'First Name must be string',
            'lastName.required' => 'Last Name field is required',
            'lastName.string' => 'Last Name must be string',
            'email.required' => 'Email field is required',
            'email.email' => 'Email must be a valid email address',
            'message.required' => 'Message field is required',
            'message.string' => 'Message must be string'
          ];
    }
}
