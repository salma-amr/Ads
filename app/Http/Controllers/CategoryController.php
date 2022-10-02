<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categories = Category::Query();    
        return response()->json(['message' => 'Category are ..', 'body' => $categories->SimplePaginate()], 200);
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
        
        $category = Category::firstOrCreate(['name' => $request->name]);
        return response()->json(['message' => 'Category created successfully', 'body' => $category], 200);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        return response()->json(['message' => 'Category is...', 'body' => $category], 200);
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
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->update(['name' => $request->name]);
        return response()->json(['message' => 'Category updated successfully', 'body' => $category], 200);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Request $request)
    {
        $category = Category::find($id);//->delete();
        if($category->Ads->count() > 0)
            return response()->json(['message' => 'Category is already having ads so it cannot be deleted', 'body' => $category], 200);

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully', 'body' =>null], 200);
    }

}
