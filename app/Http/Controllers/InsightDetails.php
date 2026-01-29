<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insight;

class InsightDetails extends Controller
{
    public function insights($slug){
        $insight = Insight::where('slug', $slug)->first();

        if($insight){
             return response( )->json($insight,200);
        }else{
          return response()->json('Not Found', 404);
        }
    }
}