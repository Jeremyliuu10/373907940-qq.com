<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Travel;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $travels = Travel::all();
        return view('travels.index', compact('travels'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    		$travel = new Travel;

        //
        return view('travels.create',compact('travel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. validate the inputted data
                $request->validate([
                  'name'=>'required',
                  'title'=> 'required',
                  'description'=> 'required',
                  'city'=> 'required',
                  'start_date'=>'required|date',
                  'end_date'=>'date'
                  ]);
                //2. create a new book model
                $travel = new Travel([
                  'name' => $request->get('name'),
                  'city'=> $request->get('city'),
                  'title'=> $request->get('title'),
                  'description'=> $request->get('description'),
                  'start_date'=>$request->get(''),
                  'end_date'=>$request->get('')
                  ]);
                //3. save the data into database
                $travel->save();
                return redirect('/travels')->with('success', 'travel notes has been added');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $travel = Travel::find($id);
		return view('travels.show', compact('travel'));
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
        $travel = Travel::find($id);
        return view('travels.edit', compact('travel'));
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
        //
         //1. validate the inputted data
                $request->validate([
                  'name'=>'required',
                  'city'=> 'required',
                  'description'=> 'required',
                  'title' => 'required'
                  ]);
                  //2. search the book from database
                  $travel = Travel::find($id);

                  //3. set the new values
                  $travel->name = $request->get('name');
                  $travel->city = $request->get('city');
                  $travel->description = $request->get('description');
                  $travel->title = $request->get('title');
                  $travel->start_date=$request->get('start_date');
                  $travel->end_date=$request->get('end_date');
                  //4. save the book into database
                  $travel->save();

                  return redirect('/travels')->with('success', 'Travel notes has been updated');
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
