<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerDetails extends Controller
{
    public function careers($title)
    {
        $career = Career::where('title', $title)->first();

        if ($career) {
            return response()->json($career, 200);
        } else {
            return response()->json('Not Found', 404);
        }
    }
}
