<?php

namespace App\Http\Controllers;

use App\Models\Publication;

class PublicationDetailsController extends Controller
{
    public function get(string $slug)
    {
        $publication = Publication::where('slug', $slug)->first();

        if ( $publication )
            return response( )->json($publication,200);
        else
            return response()->json('Not Found', 404);
    }
}
