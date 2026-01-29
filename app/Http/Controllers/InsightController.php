<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;

class InsightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Insight::paginate(6);

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
        $insight= new Insight();
        // validate your compulsory field here.

        $insight->slug = $request->slug;
        $insight->title = $request->title;
        $insight->body = $request->body;
        $insight->head1 = $request->head1;
        $insight->tag1 = $request->tag1;
        $insight->tag2 = $request->tag2;
        $insight->tag3 = $request->tag3;
        $insight->paragraph1 = $request->paragraph1;
        $insight->head2 = $request->head2;
        $insight->paragraph2 = $request->paragraph2;
        $insight->head3 = $request->head3;
        $insight->paragraph3 = $request->paragraph3;
        $insight->head4 = $request->head4;
        $insight->paragraph4 = $request->paragraph4;
        $insight->head5 = $request->head5;
        $insight->paragraph5 = $request->paragraph5;
        $insight->head6 = $request->head6;
        $insight->paragraph6 = $request->paragraph6;
        $insight->head7 = $request->head7;
        $insight->paragraph7 = $request->paragraph7;
        if($request->hasFile('image')){
            $file = $request->file('image');
           $file_name = time(). '.' . $file->getClientOriginalName();
           $file->move(('img'),$file_name);
           $insight->image = 'img/' . $file_name;

        }

        $insight->save();
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
        $insight = Insight::find($id);
        return response()-> json($insight);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insight = Insight::find($id);
        return response()-> json($insight);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $insight = Insight::find($id);
        $insight->slug = $request->slug;
        $insight->title = $request->title;
        $insight->body = $request->body;
        $insight->head1 = $request->head1;
        $insight->tag1 = $request->tag1;
        $insight->tag2 = $request->tag2;
        $insight->tag3 = $request->tag3;
        $insight->paragraph1 = $request->paragraph1;
        $insight->head2 = $request->head2;
        $insight->paragraph2 = $request->paragraph2;
        $insight->head3 = $request->head3;
        $insight->paragraph3 = $request->paragraph3;
        $insight->head4 = $request->head4;
        $insight->paragraph4 = $request->paragraph4;
        $insight->head5 = $request->head5;
        $insight->paragraph5 = $request->paragraph5;
        $insight->head6 = $request->head6;
        $insight->paragraph6 = $request->paragraph6;
        $insight->head7 = $request->head7;
        $insight->paragraph7 = $request->paragraph7;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('/img'), $file_name);
            $insight->image = 'img/' . $file_name;
        }

        $insight->update();
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
        $insight= Insight::find($id);
        $insight->delete();
        return response()->json(['Delete'], 200);
    }
}
