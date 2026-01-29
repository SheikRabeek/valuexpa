<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casestudy =  CaseStudy::all();
        return response()->json($casestudy); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $casestudy = new CaseStudy();
        $casestudy->slug = $request->slug;
        $casestudy->head  =  $request->head;
        $casestudy->body = $request->body;
        $casestudy->image = $request->image;
        $casestudy->tag1 = $request->tag1;
        $casestudy->tag2 = $request->tag2;
        $casestudy->tag3 = $request->tag3;
        $casestudy->paragraph1 = $request->paragraph1;
        $casestudy->paragraph2 = $request->paragraph2;
        $casestudy->paragraph2 = $request->paragraph2;
        $casestudy->save();
        return response() ->json(['Datas saved'], 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $casestudy = CaseStudy::find($slug);
        dd($casestudy->all()); 
        return response()->json($casestudy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}