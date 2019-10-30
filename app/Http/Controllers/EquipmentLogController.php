<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EquipmentLog;
use App\Equipment;
use Auth;
use Carbon;

class EquipmentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentlog = EquipmentLog::all()->toArray();
        return view('equipmentlog.equipmentlog_index', compact('equipmentlog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Grab all the rows from Equipment table and just grab the names
        // $equipment = Equipment::pluck('name');
        $allequipment = Equipment::all();
        $user = Auth::user();
        $mytime = Carbon\Carbon::now();
        return view('equipmentlog.equipmentlog_create')->with(['equipment' => Equipment::pluck('name'),
                                                                'allequipment' => $allequipment,
                                                                'user' => $user,
                                                                'mytime' => $mytime]);
        // return view('equipmentlog.equipmentlog_create');
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
            'name' => 'required',
            'user_name' => 'required'
        ]);
        $equipmentlog = new EquipmentLog([
            'given_id' => $request->get('given_id'),
            'name' => $request->get('name'),
            'equipment_description' => $request->get('equipment_description'),
            'user_id' => $request->get('user_id'),
            'user_name' => $request->get('user_name'),
            'use_description' => $request->get('use_description'),
            'time_in' => $request->get('time_in'),
            'time_out' => $request->get('time_out')
        ]);
        $equipmentlog->save();
        return redirect()->route('equipmentlog.index')->with('success', 'Data Added');
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
        $equipmentlog = EquipmentLog::find($id);
        return view('equipmentlog.equipmentlog_edit', compact('equipmentlog', 'id'));
    }

    public function checkIn($id)
    {
        $equipmentlog = EquipmentLog::find($id);
        $equipmentlog->time_out = Carbon\Carbon::now();
        $equipmentlog->save();
        return redirect()->route('equipmentlog.index')->with('success', 'Equipment checked in');
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
            'name' => 'required',
            'user_name' => 'required'
        ]);
        $equipmentlog = EquipmentLog::find($id);
        $equipmentlog->given_id = $request->get('given_id');
        $equipmentlog->name = $request->get('name');
        $equipmentlog->equipment_description = $request->get('equipment_description');
        $equipmentlog->user_id = $request->get('user_id');
        $equipmentlog-> user_name = $request->get('user_name');
        $equipmentlog-> use_description = $request->get('use_description');
        $equipmentlog-> time_in = $request->get('time_in');
        $equipmentlog-> time_out = $request->get('time_out');
        $equipmentlog->save();
        return redirect()->route('equipmentlog.index')->with('
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
        $equipmentlog = EquipmentLog::find($id);
        $equipmentlog->delete();
        return redirect()->route('equipmentlog.index')->with('success', 'Data Deleted');
    }

    public function fetch(Request $request)
    {
        // $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);
        // $output->writeln("Hey");

        // $row = "test func";
        // dd($row);
        $t = $request->get('equipName');

        // $t = Equipment::all();
        $data = Equipment::where('name', $t)->get()->first();
        $desc = $data->description;
        // $res = $data.description;
        // $desc = $row->description;
        // console.log($desc);
        return response()->json(['desc'=>$desc]);
    }
}
