<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

//This is our Controller for Categories. This is where we update and manipulate data in our SQL table.
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Calling this method will return data from SQL data and return it to the categories index page.
    public function index()
    {
        $categories = Categories::all()->toArray();
        return view('categories.categories_index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //This simply redirects us to the categories create page.
    public function create()
    {
        return view('categories.categories_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //This function is how a new entries get created and stored. We then return back to the index page of categories.
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $categories = new Categories([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $categories->save();
        return redirect()->route('categories.index')->with('success', 'Data Added');
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
        $categories = Categories::find($id);
        return view('categories.categories_edit', compact('categories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //This is how we update a entry. We use id to get the specific entry then return to index for categories.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'    =>  'required',
        ]);
        $categories = Categories::find($id);
        $categories->name = $request->get('name');
        $categories->description = $request->get('description');
        $categories->save();
        return redirect()->route('categories.index')->with('
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
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('success', 'Data Deleted');
    }
}
