<?php

namespace App\Http\Controllers;

use App\Services\SendContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    public function sendMail(Request $request)
    {
        /**
         * TODO:
         *  - test mail and remove current return
         */
        $request->session()->flash("email", "success");
        return redirect("/kontakt");
        Mail::to('vorstand@gcc-gochsheim.de')->send(new SendContactMail($request));

        $request->session()->flash('email', 'success');

        return redirect('/kontakt');
    }
}
