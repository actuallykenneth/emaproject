<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Calling this method will return data from SQL data and return it to the equipment index page.
    public function index()
    {
        $equipment = Equipment::all()->toArray();
        return view('equipment.equipment_index', compact('equipment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //This simply redirects us to the equipment create page.
    public function create()
    {

        // return view('equipment.equipment_create')->with(['equipment' => Equipment::find($id), 'roles' => Role::all()]);
        return view('equipment.equipement_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //This function is how a new entries get created and stored. We then return back to the index page of equipment.
    public function store(Request $request)
    {
        $this->validate($request, [
           'name'   => 'required',
        ]);

        $equipment = new Equipment([
           'given_id'   => $request->get('given_id'),
            'name'   => $request->get('name'),
            'description'   => $request->get('description')
        ]);
        $equipment->save();
        return redirect()->route('equipment.index')->with('success', 'Equipment Added');
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
    //This function allows us to edit a entry based on passed ID. returns us to the edit page
    public function edit($id)
    {
        $equipment = Equipment::find($id);
        return view('equipment.equipment_edit', compact('equipment', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //This is how we update a entry. We use id to get the specific entry then return to index for equipment.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required',
        ]);
        $equipment = Equipment::find($id);
        $equipment->given_id = $request->get('given_id');
        $equipment->name = $request->get('name');
        $equipment->description = $request->get('description');
        $equipment->save();
        return redirect()->route('equipment.index')->with('
        success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Called to destroy a specific entry in the SQL table.
    public function destroy($id)
    {
        $equipment = Equipment::find($id);
        $equipment->delete();
        return redirect()->route('equipment.index')->with('success', 'Data Deleted');
    }
}
