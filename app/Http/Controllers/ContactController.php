<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validacija
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $body = "Ime: {$data['name']}\n" .
            "Email: {$data['email']}\n\n" .
            "Poruka:\n{$data['message']}";

        Mail::raw($body, function ($message) use ($data) {
            $message->to('office@angio.co.rs')
                ->subject($data['subject'])
                ->from('kontakt@angio.co.rs', 'Angio Web Form')
                ->replyTo($data['email'], $data['name']);
        });

        // Zbog landing stranica i medalab validate.js
        if ($request->ajax()) {
            return response('OK', 200);
        }
        return back()->with('success', 'Vaša poruka je poslata. Hvala!');
    }
}
