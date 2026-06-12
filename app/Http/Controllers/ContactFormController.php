<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

final class ContactFormController extends Controller
{
    public function show(): View
    {
        return view('contact');
    }

    public function submit(ContactFormRequest $request): RedirectResponse
    {
        if ($request->filled('company')) {
            return redirect()->route('contact.show')
                ->with('success', true);
        }

        $data = $request->safe()->only(['name', 'email', 'message']);

        try {
            $recipient = config('contact.recipient');

            Mail::to($recipient)->send(new ContactFormSubmitted($data));
        } catch (\Throwable $e) {
            Log::error('Contact form mail delivery failed', [
                'error'   => $e->getMessage(),
                'email'   => $data['email'],
            ]);

            return redirect()->route('contact.show')
                ->withInput($request->only('name', 'email', 'message'))
                ->with('mail_error', true);
        }

        return redirect()->route('contact.show')
            ->with('success', true);
    }
}
