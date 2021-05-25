<?php

namespace App\Http\Controllers\Front\Contact;

use App\Http\Controllers\Controller;
use App\Services\Contact\ShowContactForm\ShowContactFormResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class ContactController
 * @package App\Http\Controllers\Front\Contact
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showContactForm()
    {
        $response = new ShowContactFormResponse();
        $response->setUser(Auth::user());
        return view('front.pages.contact.input', ['response' => $response]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sendForm()
    {
        return view('front.pages.contact.send');
    }
}
