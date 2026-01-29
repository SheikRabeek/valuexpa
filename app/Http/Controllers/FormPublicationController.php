<?php

namespace App\Http\Controllers;

use App\Models\FormPublication;
use App\Models\Publication;
use Illuminate\Http\Request;

class FormPublicationController extends Controller
{
    public function index()
    {
        $publications = FormPublication::with('publication')->get();
        return response()->json($publications->toArray());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'email'          => 'required|email',
            'agree'          => 'required',
            'publication_id' => 'required|int',
        ]);

        $publication = Publication::findOrFail($request->publication_id);

        $formPublication = new FormPublication();
        $formPublication->name           = $request->name;
        $formPublication->email          = $request->email;
        $formPublication->phone          = $request->phone;
        $formPublication->company        = $request->company;
        $formPublication->publication_id = $publication->id;

        if ($formPublication->save()) {
            if ($publication->pdf) {
                $from = "info@valuexpa.com";
                $ccRecipients = ["franicons@gmail.com"];
                $headers = [
                    "From:" . $from,
                    "MIME-Version: 1.0",
                    "Content-type: text/html; charset=iso-8859-1",
                    "Cc: " . implode(', ', $ccRecipients),
                ];
                $message = view('mail.form_publication', [
                    'name' => $formPublication->name,
                    'pdf'  => $publication->pdf
                ])->render();

                if (@mail(
                    $formPublication->email,
                    $publication->title,
                    $message,
                    implode("\r\n", $headers)
                )) {
                    return response()->json([
                        'message'      => 'Saved Successfully & Mail Sent',
                        'download_url' => asset('pdf/' . $publication->pdf),
                    ], 200);
                } else {
                    return response()->json([
                        'message'      => 'Saved Successfully but Mail Failed',
                        'download_url' => asset('pdf/' . $publication->pdf),
                    ], 200);
                }
            }
        }

        return response()->json(['message' => 'Saved Successfully'], 200);
    }
}
