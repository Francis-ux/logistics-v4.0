<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactControllerStoreRequest;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Contact Us'
        ];

        return view('frontend.contact.index', $data);
    }

    public function store(ContactControllerStoreRequest $request)
    {
        $validated = $request->validated();

        try {
            Mail::to(config('contact.email'))->send(new Contact($validated, 'Contact Notification'));

            return redirect()->route('contact.index')->with('success', config('messages.success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }
}
