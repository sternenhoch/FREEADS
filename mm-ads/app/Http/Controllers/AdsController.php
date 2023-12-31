<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        if(request()->has('search')){
            $ads = ads::where('title','like', '%'.request()->get('search','') . '%')->paginate(5);
            return view('index', ['ads' =>$ads]);
        }
        return view('index', ['ads' =>DB::table('ads')->paginate(5)]);
        //return view('Ads.index',compact('ads'));
                 
    }

    public function ad (){
        return view('Ads.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('Ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $ads = Ads::create($request->all());
        //$ads->create($request->all());
         
        return redirect()->route('ads.index')
                        ->with('success','Ad created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ad): View
    {
        return view('Ads.show',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad): View
    {
        return view('Ads.edit',compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $ads->update($request->all());
        
        return redirect()->route('ads.index')
                        ->with('success','Ad updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads): RedirectResponse
    {
        $ads->delete();
        return redirect()->route('ads.index')
                        ->with('success','Ad deleted successfully');
    }
}
