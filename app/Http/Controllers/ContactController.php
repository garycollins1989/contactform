<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\NewEnquiry;
use App\Notifications\ThanksEnquiry;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Admin;

class ContactController extends Controller
{
    public function show() 
	{
		return view('/contact');
	}

	public function mailToAdmin(ContactFormRequest $message, Admin $admin)
	{       
        $admin->notify(new NewEnquiry($message));
        
		// redirect the user back
		return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
    }
    
    public function mailToUser(ContactFormRequest $email)
    {
        $email->notify(new ThanksEnquiry($message));
    }
}
