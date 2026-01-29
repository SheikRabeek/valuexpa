<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class PriceMailController extends Controller {
    public function index(Request $request) {
        $data = [
            'subject' => 'New Price Notification',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'industry' => $request->industry,
            'employees' => $request->employees,
            'revenue' => $request->revenue,
        ];
        Mail::send('mail.price_mail', ['data' => $data], function ($d) use ($data){
            $d->from('info@valuexpa.com', 'Price Request');

            $d->to('info@valuexpa.com')->subject('Price Request');
        });
    }
}
