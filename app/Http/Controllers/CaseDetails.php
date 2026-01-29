<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseDetails extends Controller
{
    public function cases($head){
        $casestudy = CaseStudy::where('slug', $head)->first();
        
        if($casestudy){
            return response()->json($casestudy, 200);
        }else{
            return response()->json('Not Found', 404);
        }
    }
}