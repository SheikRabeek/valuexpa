<?php

namespace App\Http\Controllers;

use App\Models\FormContact;
use Illuminate\Http\Request;

class FormContactController extends Controller {

    public function index() {
        $formsContact = FormContact::all();

        $result = [];
        foreach ( $formsContact as $formContact )
        {
            $date = clone $formContact->created_at;
            $date->setTimezone(env('APP_TIMEZONE'));

            $result[] = array_merge(
                $formContact->toArray(),
                ['date' => $date->format('d.m.Y H:i')]
            );
        }

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $formContact = new FormContact();

        $formContact->name = $request->name;
        $formContact->email = $request->email;
        $formContact->phone = $request->phone;
        $formContact->company = $request->company;
        $formContact->message = $request->message;

        if ( $formContact->save() )
        {
            $from = "info@valuexpa.com";

            $headers = "From:" . $from."\r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1";
            $message = view('mail.form_contact', [
                'name' => $formContact->name,
                'email' => $formContact->email,
                'phone' => $formContact->phone,
                'company' => $formContact->company,
                'message' => $formContact->message,
            ]);

            mail(env('FORM_CONTACT_EMAIL'), 'Contact Us Form', $message, $headers);
        }

        return response()->json(['message' => 'Saved Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formContact = FormContact::findorFail($id);
        $formContact->delete();

        return response()->json(['Delete'], 200);
    }
}
