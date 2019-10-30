<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::all()->toArray();
        return view('log.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('log.create')->with(['category' => Categories::pluck('name')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
        $logs = new Log([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'role' => $request->get('role'),
            'activity' => $request->get('activity'),
            'time_in' => $request->get('time_in'),
            'time_out' => $request->get('time_out'),
            'description' => $request->get('description')
        ]);
        $logs->save();
        return redirect()->route('log.index')->with('success', 'Data Added');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logs = Log::find($id);
        return view('log.edit', compact('logs', 'id'));
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
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required'
        ]);
        $logs = Log::find($id);
        $logs->first_name = $request->get('first_name');
        $logs->last_name = $request->get('last_name');
        $logs-> role = $request->get('role');
        $logs-> activity = $request->get('activity');
        $logs-> time_in = $request->get('time_in');
        $logs-> time_out = $request->get('time_out');
        $logs-> description = $request->get('description');
        $logs->save();
        return redirect()->route('log.index')->with('
        success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logs = Log::find($id);
        $logs->delete();
        return redirect()->route('log.index')->with('success', 'Data Deleted');
    }
}
