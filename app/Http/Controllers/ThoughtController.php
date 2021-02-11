<?php

namespace App\Http\Controllers;
use App\Thought;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Thought::where('user_id', auth()->id())->with('user')->get();
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thought = new Thought();
        $thought->description= $request->description;
        $thought->user_id= auth()->id();
        $thought->save();

        return $thought;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        $thought= Thought::find($id);
        $thought->description = $request->description;
        $thought->save();
        
        return $thought;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thought= Thought::find($id);
        $thought->delete();
    }
}
