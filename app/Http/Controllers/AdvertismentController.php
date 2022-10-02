<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisment;

class AdvertismentController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'tag' => 'exists:tags,id',
            'category' => 'exists:categories,id',
            'advertiser' => 'exists:advertisers,id',
        ]);
        $ads =   Advertisment::when($request->filled('category'), function ($q) use ($request){
                    return $q->where('category_id', $request->category);
                })
                ->when($request->filled('tag'), function ($q) use ($request){
                    return $q->whereHas('tags', function ($query) use ($request) {
                           $query->where('tag_id', $request->tag);
                    });
                })
                ->when($request->filled('advertiser'), function ($q) use ($request){
                    return $q->where('advertiser_id', $request->advertiser);
                })
                ->with('category','tags','advertiser')->SimplePaginate();

        return response()->json(['message' => 'Ads ..', 'body' => $ads], 200);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Request $request)
    {

    }

}
