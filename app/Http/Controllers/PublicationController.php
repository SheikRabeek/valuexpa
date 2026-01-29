<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication = Publication::all();

        return response()->json($publication);
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
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:publications'
        ]);

        $publication= new Publication();

        $publication->title = $request->title;
        $publication->slug = $request->slug;
        $publication->subheading = $request->subheading;
        $publication->form_header = $request->form_header;
        $publication->form_subheading = $request->form_subheading;
        $publication->form_subheading2 = $request->form_subheading2;

        if ( $request->hasFile('image') )
        {
            $file = $request->file('image');
            $file_name = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('img/'),$file_name);
            $publication->image = 'img/' . $file_name;
        }

        if ( $request->hasFile('pdf') )
        {
            $file = $request->file('pdf');
            $file_name = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('pdf/'),$file_name);
            $publication->pdf = 'pdf/' . $file_name;
        }

        $publication->save();

        return response()->json(['message'=>'Saved Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::find($id);

        return response()-> json($publication);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publication = Publication::find($id);

        return response()-> json($publication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $publication = Publication::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:publications,slug,'.$publication->id
        ]);

        $publication->title = $request->title;
        $publication->slug = $request->slug;
        $publication->subheading = $request->subheading;
        $publication->form_header = $request->form_header;
        $publication->form_subheading = $request->form_subheading;
        $publication->form_subheading2 = $request->form_subheading2;

        if ( $request->hasFile('image') )
        {
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('img/'), $file_name);
            $publication->image = 'img/' . $file_name;
        }

        if ( $request->hasFile('pdf') )
        {
            $file = $request->file('pdf');
            $file_name = time(). '.' . $file->getClientOriginalName();
            $file->move(public_path('pdf/'), $file_name);
            $publication->pdf = 'pdf/' . $file_name;
        }

        $publication->update();

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
        $publication = Publication::findorFail($id);
        $publication->delete();

        return response()->json(['Delete'], 200);
    }
}
