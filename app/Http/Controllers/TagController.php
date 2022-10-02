<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Tags = Tag::Query();    
        return response()->json(['message' => 'Tags are ..', 'body' => $Tags->SimplePaginate()], 200);
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
            'name' => 'required'
        ]);
        
        $Tag = Tag::firstOrCreate(['name' => $request->name]);
        return response()->json(['message' => 'Tag created successfully', 'body' => $Tag], 200);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tag = Tag::find($id);    
        return response()->json(['message' => 'Tag is', 'body' => $Tag], 200);
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
        $Tag = Tag::find($id);
        $Tag->update([
            'name' => $request->name ?? $Tag->name,
        ]);
        return response()->json(['message' => 'Tag updated succeffully', 'body' => $Tag], 200);

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Request $request)
    {
        $tag = Tag::find($id);
        if($tag->Ads->count() > 0)
            return response()->json(['message' => 'Tag is already having ads so it cannot be deleted', 'body' => $tag], 200);

        $tag->delete();
        return response()->json(['message' => 'Tag deleted successfully', 'body' =>null], 200);
    }

}
